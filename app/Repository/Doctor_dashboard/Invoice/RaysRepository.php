<?php


namespace App\Repository\Doctor_dashboard\Invoice;

use App\Interfaces\Doctor_dashboard\Invoice\RaysRepositoryInterface;
use App\Models\Invoice;
use App\Models\Ray;
use Illuminate\Support\Facades\Auth;

class RaysRepository implements RaysRepositoryInterface
{

    public function store($request)
    {
        try {
            Ray::create([
                'description' => $request->description,
                'invoice_id' => $request->invoice_id,
                'patient_id' => $request->patient_id,
                'doctor_id' => $request->doctor_id,
            ]);

            flash()->success('تم التحويل الى قسم الاشعة بنجاح.');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $Ray = Ray::findOrFail($id);
            $Ray->update([
                'description' => $request->description,
            ]);
            flash()->addInfo('تم تعديل الاشعة بنجاح.');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Ray::destroy($id);
            flash()->addWarning('تم حذف الاشعة بنجاح.');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
