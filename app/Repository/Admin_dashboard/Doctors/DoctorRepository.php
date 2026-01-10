<?php

namespace App\Repository\Admin_dashboard\Doctors;

use App\Interfaces\Admin_dashboard\Doctors\DoctorsRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DoctorRepository implements DoctorsRepositoryInterface
{
    use UploadTrait;

    public function index()
    {
        $doctors = Doctor::with('doctorappointments:id,name')->orderBy('id', 'desc')->paginate(15);

        // $doctors = Doctor::orderBy('id', 'desc')->paginate(15);
        $sections = Section::orderBy('name', 'asc')->get();
        $appointments = Appointment::orderBy('name', 'asc')->get();

        return view('dashboard.admin.doctors.index', compact('doctors', 'sections', 'appointments'));
    }


    public function store($request)
    {
        DB::beginTransaction();
        try {

            $doctors = new Doctor();
            $doctors->name = $request->name;
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->status = 1;
            $doctors->save();

            // ربط المواعيد
            $doctors->doctorappointments()->sync($request->appointments ?? []);

            // Upload img
            $this->verifyAndStoreImage($request, 'photo', 'doctors', 'upload_image', $doctors->id, 'App\Models\Doctor');

            DB::commit();
            flash()->success('تم اضافة الطبيب بنجاح.');
            return redirect()->route('doctors.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update(Request $request)
    {
        DB::beginTransaction();


        $doctor = Doctor::findOrFail($request->id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->section_id = $request->section_id;
        $doctor->phone = $request->phone;
        $doctor->number_of_statements = $request->number_of_statements;
        $doctor->save();

        // Sync appointments
        $doctor->doctorappointments()->sync($request->appointments ?? []);

        // Update photo
        if ($request->hasFile('photo')) {

            if ($doctor->image) {
                $old_img = $doctor->image->filename;
                $this->Delete_attachment('upload_image', 'doctors/' . $old_img, $request->id);
            }

            $this->verifyAndStoreImage($request, 'photo', 'doctors', 'upload_image', $request->id, 'App\Models\Doctor');
        }

        DB::commit();
        flash()->addInfo('تم تعديل الطبيب بنجاح.');
        return redirect()->back();
    }


    public function destroy($request)
    {

        if ($request->filename) {

            $this->Delete_attachment('upload_image', 'doctors/' . $request->filename, $request->id, $request->filename);
        }
        Doctor::destroy($request->id);
        flash()->addWarning('تم حذف الطبيب بنجاح.');
        return redirect()->route('doctors.index');
    }


    public function update_password(Request $request)
    {
        try {
            $doctor = Doctor::findorfail($request->id);
            $doctor->update([
                'password' => Hash::make($request->password)
            ]);

        flash()->addInfo('تم تعديل كلمة المرور بنجاح.');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update_status(Request $request)
    {
        try {
            $doctor = Doctor::findorfail($request->id);
            $doctor->update([
                'status'=>$request->status
            ]);

        flash()->addInfo('تم تعديل الحلة بنجاح.');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
