<?php

namespace App\Repository\Admin_dashboard\Services;

use App\Interfaces\Admin_dashboard\Services\SingleServiceRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Section;
use App\Models\Service;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SingleServiceRepository implements SingleServiceRepositoryInterface

{

    public function index()
    {
        $services = Service::orderBy('id', 'desc')->paginate(15);
        return view('dashboard.admin.services.index', compact('services'));
    }

    public function store(Request $request)
    {
        try {

            Service::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'status' => 1,
            ]);

            flash()->success('تم اضافة الخدمة بنجاح.');
            return redirect()->route('services.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {


        try {


            $service = Service::findOrFail($request->id);
            $service->update([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'status' => $request->input('status'),
                'description' => $request->input('description'),
            ]);
            flash()->addInfo('تم تعديل الخدمة بنجاح.');
            return redirect()->route('services.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Request $request)
    {
        Section::findOrFail($request->id);
    }

    public function destroy(Request $request)
    {
        Service::findOrFail($request->id)->delete();
        flash()->addWarning('تم حذف الخدمة بنجاح.');
        return redirect()->route('services.index');
    }
}
