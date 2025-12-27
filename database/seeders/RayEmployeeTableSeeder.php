<?php

namespace Database\Seeders;

use App\Models\RayEmployee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RayEmployeeTableSeeder extends Seeder
{

    public function run(): void
    {
        $ray_employee = new RayEmployee();
        $ray_employee->name = 'محمد ';
        $ray_employee->email = 'm@yahoo.com';
        $ray_employee->password = Hash::make('12345678');
        $ray_employee->save();
    }
}
