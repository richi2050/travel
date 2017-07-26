<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Response;

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

    public static function login(Request $request){
        try {
            $client = new Client();
            $url= 'http://cpaaccess.cpalumis.com.mx/api/usuario/login';
            $response = $client->post($url, [
                'headers'=> [
                    'Content-Type' => 'application/json'
                ],
                'body'    =>json_encode([
                    "email"     =>$request->email,
                    "password"  =>$request->password,
                    "servicio"  =>"7",
                    "origen"    =>"web"])
            ]);
            $zonerStatusCode = $response->getStatusCode();
            $zonerResponse = json_decode($response->getBody());
            //dd($zonerResponse);
             return response()->json($zonerResponse);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

    }
}
