<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $fillable =[
        'id',
        'name',
        'description',
        'project_id',
        'sub_project_id',
        'amount',
        'active',
        'business_id'];
}
