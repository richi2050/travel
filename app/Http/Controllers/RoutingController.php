<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutingController extends Controller
{
    public function businessProcess(){
        return view('menus.business_processes');
    }
}
