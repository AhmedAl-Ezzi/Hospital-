<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public $fillable= ['notes','name','total_before_discount','discount_value','total_after_discount','tax_rate','total_with_tax'];

    // public function service_group()
    // {
    //     return $this->belongsToMany(Service::class,'service_groups');
    // }

    public function service_group()
{
    return $this->belongsToMany(Service::class, 'service_groups', 'group_id', 'service_id')->withPivot('quantity');
}


//  public function service_group()
//     {
//         return $this->belongsToMany(Service::class,'service_group')->withPivot('quantity');
//     }


}
