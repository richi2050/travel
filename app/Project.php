<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Project extends Model
{
    protected $table='projects';

    protected $fillable=[
        'name',
        'description',
        'user_id',
        'active'
    ];

    public function randon(){
        return 45;
    }

    public function user(){
        return $this->belongsTo('App\User');
    }


}
