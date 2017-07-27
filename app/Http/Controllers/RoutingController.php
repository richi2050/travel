<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutingController extends Controller
{

    public function businessProcess(){
        if(checkPermission('click_me_pro_negocios')){
            dd('aborte');
        }
        return view('menus.business_processes');
    }
}
