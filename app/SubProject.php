<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProject extends Model
{
    protected $table='sub_project';

    protected $fillable =[
        'name',
        'project_id',
        'user_id',
        'active'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }





}
