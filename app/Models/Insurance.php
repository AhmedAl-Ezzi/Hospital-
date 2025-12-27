<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Insurance extends Model
{
    use HasFactory;
    public $fillable= ['name','notes','insurance_code','discount_percentage','company_rate','status'];
}
