<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public static function login(){
        $client = new Client();
        $body =[];
        $body['email'] = "ricardo.lugo@cpavs.mx";
        $body['password'] = "LBZadmOX7T";
        $body['servicio'] = "1";
        $body['origen'] = "web";
        $url= 'http://cpaaccess.cpalumis.com.mx/api/usuario/login';


        $response = $client->post($url, ['form_params' => $body]);
        $zonerStatusCode = $response->getStatusCode();
        //dd($zonerStatusCode);
        $zonerResponse = json_decode($response->getBody());
        dd($zonerResponse);
    }
}
