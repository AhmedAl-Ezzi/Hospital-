<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoctorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('doctors')->delete();

        Doctor::factory()->count(30)->create();



            // $Appointments = Appointment::all();

    //     Doctor::all()->each(function ($doctor) use ($Appointments) {
    //        $doctor->doctorappointments()->attach(
    //           $Appointments->random(rand(1,7))->pluck('id')->toArray()
    //        );
    //    });
    }
}
