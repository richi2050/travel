<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\Businessrelation;


class BusinessController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public static function index(){
        $dataBusiness = Businessrelation::where('business_relation.user_id', 1)
            ->join('business', 'business.id', '=', 'business_relation.business_id')
            ->select('business.*','business_relation.*')->get();

        return view('auth.business',['business' => $dataBusiness]);


    }
}
