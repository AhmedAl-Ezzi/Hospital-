<?php

namespace App\Repository\Admin_dashboard\Appointments;

use App\Interfaces\Admin_dashboard\Appointments\AppointmentRepositoryInterface;
use App\Mail\AppointmentConfirmation;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentRepository implements AppointmentRepositoryInterface
{
    public function index()
    {

        $appointments = Appointment::where('type', 'غير مؤكد')->get();
        return view('dashboard.admin.appointments.index', compact('appointments'));
    }

    public function index2()
    {

        $appointments = Appointment::where('type', 'مؤكد')->get();
        return view('dashboard.admin.appointments.index2', compact('appointments'));
    }

    public function finsh()
    {

        $appointments = Appointment::where('type', 'منتهي')->get();
        return view('dashboard.admin.appointments.finsh', compact('appointments'));
    }

    public function approval(Request $request, $id)
    {
        $appointment = Appointment::findorFail($id);
        $appointment->update([
            'type' => 'مؤكد',
            'appointment' => $request->appointment
        ]);

        // send email
        Mail::to($appointment->email)->send(new AppointmentConfirmation($appointment->name, $appointment->appointment));


        //     // send message mob
        //     $receiverNumber = $appointment->phone;
        //     $message = "عزيزي المريض" . " " . $appointment->name . " " . "تم حجز موعدك بتاريخ " . $appointment->appointment;

        //     $account_sid = getenv("TWILIO_SID");
        //     $auth_token = getenv("TWILIO_TOKEN");
        //     $twilio_number = getenv("TWILIO_FROM");
        //     $client = new Client($account_sid, $auth_token);
        //     $client->messages->create($receiverNumber, [
        //         'from' => $twilio_number,
        //         'body' => $message
        //     ]);

        flash()->success('تم حفظ البيانات بنجاح.');
        return back();
    }



    public function destroy($id)
    {
        Appointment::destroy($id);
        flash()->addWarning('تم حذف الموعد بنجاح.');
        return back();
    }
}
