<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubProject extends Model
{
    protected $fillable =[
        'name',
        'description',
        'project_id',
        'active'
    ];
}
