<?php

namespace App\Livewire\Appointments;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use Livewire\Component;

class Create extends Component
{

    public $doctors;
    public $sections;
    public $doctor;
    public $section;
    public $name;
    public $email;
    public $phone;
    public $notes;
    public $appointment_patient;
    // public $message = false;
    // public $message2 = false;


    public function mount()
    {

        $this->sections = Section::get();
        $this->doctors = collect();
    }

    public function render()
    {
        return view(
            'livewire.appointments.create',
            [
                'sections' => Section::get(),
            ]
        );
    }

    public function updatedSection($section_id)
    {
        $this->doctors = Doctor::where('section_id', $section_id)->get();
    }




    public function store()
    {



        //chek number_of_statements

        $appointment_count = Appointment::where('doctor_id', $this->doctor)->where('type', 'غير مؤكد')->where('appointment_patient', $this->appointment_patient)->count();
        $doctor_info = Doctor::find($this->doctor);

        if ($appointment_count == $doctor_info->number_of_statements) {
            // $this->message2 = true;
            flash()->addWarning('لايوجد مواعيد متاحة لهذا اليوم يمكنك الحجز ليوم اخر .');
            return back();
        }

        $appointments = new Appointment();
        $appointments->doctor_id = $this->doctor;
        $appointments->section_id = $this->section;
        $appointments->name = $this->name;
        $appointments->email = $this->email;
        $appointments->phone = $this->phone;
        $appointments->notes = $this->notes;
        $appointments->appointment_patient = $this->appointment_patient;
        $appointments->save();
        flash()->success('تم اضافة الاشعة بنجاح.');
        // $this->message = true;
    }
}
