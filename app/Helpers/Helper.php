<?php


function checkPermission($name){
    if(Session::has('rol')){
        foreach (Session::get('rol')->permisos as $per)
        {
            if($per->name_holder == $name){
                return true;
            }
        }
    }
    return false;
}