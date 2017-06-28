<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
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
}
