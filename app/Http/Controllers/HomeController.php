<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Mockery\Exception;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth.session')->only('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Session::get('user_id') != '' && Session::get('token') != ''){
            return view('home');
        }
        return view('auth.login');
    }



    public static function getData(Request $request){
        $client = new Client();
        $body =[];
        $body['username'] = "xyz";
        $body['password'] = "xyz";
        $url= 'http://cpaaccess.cpalumis.com.mx/api/usuario/getResponse';


        $response = $client->post($url, ['form_params' => $body]);
        $zonerStatusCode = $response->getStatusCode();
        //dd($zonerStatusCode);
        $zonerResponse = json_decode($response->getBody());
        dd($zonerResponse);
        /*
         * {#185
  +"info": {#183
    +"name": "Carlos"
  }
  +"permissions": {#170
    +"modules": {#180
      +"projectos": {#173
        +"crud": {#171
          +"C": 0
          +"R": 0
          +"U": 0
          +"D": 1
        }
      }
      +"job": {#169
        +"crud": {#184
          +"C": 1
          +"R": 1
          +"U": 1
          +"D": 0
        }
      }
      +"travel": {#177
        +"crud": {#186
          +"C": 0
          +"R": 1
          +"U": 0
          +"D": 1
        }
      }
    }
  }
}*/
    }

    public static function prueba($header){
        try {
            $client = new Client();
            $body =[];
            $body['username'] = "xyz";
            $body['token'] ='bearer '.$header;
            $url= 'http://cpaaccess.cpalumis.com.mx/api/usuario/validaToken';
            $response = $client->post($url, ['headers'=>
                [
                    'Authorization' => $body['token']
                ]]);
            $zonerStatusCode = $response->getStatusCode();
            $zonerResponse = json_decode($response->getBody());
        } catch (\Exception $e) {
            $messesage = $e->getMessage();
            if(strpos($messesage,'token_invalid') !== FALSE){
                return response()->json(['error' => false,'message' =>'token_invalid']);
            }else if(strpos($messesage,'token_expired') !== FALSE){
                return response()->json(['error' => false,'message' =>'token_expired']);
            }else{
                return response()-jason(['error' => false,'message' =>'algo_paso']);
            }
        }
    }
}
