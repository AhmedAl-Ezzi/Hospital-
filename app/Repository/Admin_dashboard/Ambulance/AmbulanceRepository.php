<?php

namespace App\Repository\Admin_dashboard\Ambulance;

use App\Http\Requests\StoreAmbulanceRequest;
use App\Interfaces\Admin_dashboard\Ambulances\AmbulanceRepositoryInterface;
use App\Models\Ambulance;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Request;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{

    public function index()
    {
        $ambulances = Ambulance::orderBy('id', 'desc')->paginate(15);
        return view('dashboard.admin.ambulances.index', compact('ambulances'));
    }

    public function store( $request)
    {
        try {

            $ambulances = new Ambulance();
            $ambulances->driver_name = $request->driver_name;
            $ambulances->notes = $request->notes;
            $ambulances->car_number = $request->car_number;
            $ambulances->car_model = $request->car_model;
            $ambulances->car_year_made = $request->car_year_made;
            $ambulances->driver_license_number = $request->driver_license_number;
            $ambulances->driver_phone = $request->driver_phone;
            $ambulances->is_available = 1;
            $ambulances->car_type = $request->car_type;
            $ambulances->save();


            flash()->success('تم اضافة سيارة الاسعاف بنجاح.');
            return redirect()->route('ambulances.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        if (!$request->has('is_available'))
            $request->request->add(['is_available' => 2]);
        else
            $request->request->add(['is_available' => 1]);

        $ambulance = Ambulance::findOrFail($request->id);

        $ambulance->update($request->all());
        $ambulance->save();

        flash()->addInfo('تم تعديل سيارة الاسعاف بنجاح.');
        return redirect()->route('ambulances.index');
    }

    public function show($request)
    {
        Ambulance::findOrFail($request->id);
    }

    public function destroy($request)
    {
        Ambulance::findOrFail($request->id)->delete();
        flash()->addWarning('تم حذف سيارة الاسعاف بنجاح.');
        return redirect()->route('ambulances.index');
    }

}
