<?php

namespace App\Repository\Admin_dashboard\insurances;

use App\Interfaces\Admin_dashboard\insurances\InsuranceRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Insurance;
use App\Models\Section;
use Illuminate\Auth\Events\Validated;

class InsuranceRepository implements InsuranceRepositoryInterface
{

    public function index()
    {
        $insurances = Insurance::orderBy('id', 'desc')->paginate(15);
        return view('dashboard.admin.insurances.index', compact('insurances'));
    }

    public function store($request)
    {

         try {
            $insurances = new Insurance();
            $insurances->name = $request->name;
            $insurances->notes = $request->notes;
            $insurances->insurance_code = $request->insurance_code;
            $insurances->discount_percentage = $request->discount_percentage;
            $insurances->company_rate = $request->company_rate;
            $insurances->status = 1;
            $insurances->save();

        flash()->success('تم اضافة البيانات بنجاح.');
        return redirect()->route('insurances.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        if (!$request->has('status'))
            $request->request->add(['status' => 0]);
        else
            $request->request->add(['status' => 1]);

        $insurances = insurance::findOrFail($request->id);

        $insurances->update($request->all());
        $insurances->save();
        flash()->addInfo('تم تعديل البيانات بنجاح.');
        return redirect()->route('insurances.index');
    }

    public function show($request)
    {
        Insurance::findOrFail($request->id);
    }

    public function destroy($request)
    {

        Insurance::destroy($request->id);
        flash()->addWarning('تم حذف البيانات بنجاح.');
        return redirect()->route('insurances.index');
    }

}
