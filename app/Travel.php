<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table ='travels';

    protected $fillable =[
        'travel_account',
        'project_id',
        'sub_project_id',
        'user_id',
        'amount'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function subproject()
    {
        return $this->belongsTo('App\SubProject','sub_project_id','id');
    }





/*    public function travel() {
        return $this->hasOne('App\Travel');
    }*/


}
