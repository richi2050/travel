<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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

    public function autocomplete(Request $request){
        $data = User::select("id","name")->where("name","LIKE","%{$request->input('query')}%")->take(5)->get();
        return response()->json($data);

    }

    public function pru(){
        return 45;
    }
}
