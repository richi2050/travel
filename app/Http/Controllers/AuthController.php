<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Exception;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use Response;

class AuthController extends Controller
{

    public function index()
    {

        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('entra a la funcion');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            if($zonerResponse->success){
                $request->session()->put('user_id', $zonerResponse->request->user_id );
                $request->session()->put('token',$zonerResponse->request->token );
                $request->session()->put('name',$zonerResponse->request->name);
                $request->session()->put('img',$zonerResponse->request->img);
                $request->session()->put('lastName',$zonerResponse->request->lastName);
                $request->session()->put('rol',$zonerResponse->request->rol);
                $request->session()->put('structure',$zonerResponse->request->structure);
                return redirect()->route('list');
            }else{

            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            dd('algo ocurrio');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public  function logout(){
        Session::forget('user_id');
        Session::forget('token');
        Session::forget('business_id');
        Session::forget('goup_id');
        Session::forget('business_description');

        Session::forget('name');
        Session::forget('img');
        Session::forget('lastName');
        return redirect('/');
    }


}
