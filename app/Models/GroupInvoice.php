<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupInvoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_type',
        'invoice_date',
        'patient_id',
        'doctor_id',
        'section_id',
        'Group_id',
        'price',
        'discount_value',
        'tax_rate',
        'tax_value',
        'total_with_tax',
        'type',
    ];

      public function Group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }

    public function Patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function Doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function Section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}
