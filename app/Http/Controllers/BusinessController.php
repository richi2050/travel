<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Response;

class BusinessController extends Controller
{
    public function lista(){
        Session::forget('business_id');
        Session::forget('goup_id');
        Session::forget('business_description');
        $client = new Client();
        $urlBussines = "http://cpaaccess.cpalumis.com.mx/api/usuario/businessListing";
        $responseBussines = $client->post($urlBussines, [
            'headers'=> [
                'Content-Type' => 'application/json',
                'Authorization'=> 'bearer '.Session::get('token')
            ]
        ]);
        $zonerStatusCodeBusi = $responseBussines->getStatusCode();
        $zonerResponseBusi = json_decode($responseBussines->getBody());
        return view('list_bussines',['lista' => $zonerResponseBusi]);
    }

    public function generateBusiness(Request $request){

        $request->session()->put('business_id',$request->id);
        $request->session()->put('goup_id',$request->group_id);
        $request->session()->put('business_description',$request->description);
        return response()->json(['success' => true ]);
    }
}
