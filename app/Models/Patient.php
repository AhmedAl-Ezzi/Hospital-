<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    public $fillable= [
        'name',
        'Address',
        'email',
        'password',
        'Date_Birth',
        'Phone',
        'Gender',
        'Blood_Group'
    ];

}
