<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class ServiciosController extends Controller
{
    public static function getProfile($id){
        try {
            $client = new Client();
            $url= 'http://cpaaccess.cpalumis.com.mx/api/usuario/profile';
            $response = $client->post($url, [
                'headers'=> [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'bearer '.Session::get('token')
                ],
                'body'    =>json_encode([
                    "idd"       => $id,
                    "permiso"   => "getProfile"])
            ]);
            $zonerStatusCode = $response->getStatusCode();
            $zonerResponse = json_decode($response->getBody());
            if($zonerResponse->success){
                return response()->json($zonerResponse);
            }else{

            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            dd('algo ocurrio');
        }
    }
}
