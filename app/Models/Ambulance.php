<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ambulance extends Model
{
        use HasFactory;
        public $fillable= ['driver_name','notes',
        'car_number','car_model',
        'car_year_made','driver_license_number',
        'driver_phone','is_available','car_type'];

}
