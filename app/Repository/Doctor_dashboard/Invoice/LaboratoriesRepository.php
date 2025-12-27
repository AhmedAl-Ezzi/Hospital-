<?php


namespace App\Repository\Doctor_dashboard\Invoice;

use App\Interfaces\Doctor_dashboard\Invoice\LaboratoriesRepositoryInterface;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Ray;
use Illuminate\Support\Facades\Auth;

class LaboratoriesRepository implements LaboratoriesRepositoryInterface
{


    public function store($request)
    {
        try {

            Laboratorie::create([
                'description'=>$request->description,
                'invoice_id'=>$request->invoice_id,
                'patient_id'=>$request->patient_id,
                'doctor_id'=>$request->doctor_id,
            ]);
            flash()->success('تم التحويل الى المختبر بنجاح.');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $Laboratorie = Laboratorie::findOrFail($id);
            $Laboratorie->update([
                'description' => $request->description,
            ]);
            flash()->addInfo('تم تعديل المختبر بنجاح.');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            Laboratorie ::destroy($id);
            flash()->addWarning('تم حذف المختبر بنجاح.');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
