<?php


namespace App\Repository\Doctor_dashboard\Invoice;

use App\Interfaces\Doctor_dashboard\Invoice\DiagnosisRepositoryInterface;
use App\Models\Diagnostic;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Ray;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class DiagnosisRepository implements DiagnosisRepositoryInterface
{

    public function store($request)
    {
        DB::beginTransaction();

        try {


            $this->invoice_status($request->invoice_id, 3);

            $diagnosis = new Diagnostic();
            $diagnosis->date = date('Y-m-d');
            $diagnosis->diagnosis = $request->diagnosis;
            $diagnosis->medicine = $request->medicine;
            $diagnosis->invoice_id = $request->invoice_id;
            $diagnosis->patient_id = $request->patient_id;
            $diagnosis->doctor_id = $request->doctor_id;
            $diagnosis->save();

            DB::commit();
            flash()->success('تم اضافة التشخيض بنجاح.');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {

        // $rays = Ray::findorFail($id);

        // if ($patient_rays->doctor_id != auth()->user()->id) {
        //     abort(404);
        //     // return redirect()->route('404');
        // }


        $patient_records = Diagnostic::where('patient_id', $id)->orderBy('id', 'desc')->get();
        $patient_rays = Ray::where('patient_id', $id)->orderBy('id', 'desc')->get();
        $patient_laboratories = Laboratorie::where('patient_id', $id)->orderBy('id', 'desc')->get();



            // تحقق إذا كان الطبيب له علاقة بأي من السجلات
    $hasAccess = $patient_records->where('doctor_id', auth()->id())->count() > 0 ||
                 $patient_rays->where('doctor_id', auth()->id())->count() > 0 ||
                 $patient_laboratories->where('doctor_id', auth()->id())->count() > 0;

    if (!$hasAccess) {

   return view('dashboard.doctors.page-404');
        // abort(403, 'ليس لديك صلاحية لعرض سجلات هذا المريض');


    }






        // $doctorId = auth()->user()->id;

        // $patient_records = Diagnostic::where('patient_id', $id)->orderBy('id', 'desc')->get();
        // $patient_laboratories=Laboratorie::where('patient_id',$id)->orderBy('id', 'desc')->get();


        // $patient_records = Diagnostic::where('patient_id', $id)
        //     ->where('doctor_id', $doctorId)
        //     ->orderBy('id', 'desc')
        //     ->get();

        // $patient_rays = Ray::where('patient_id', $id)
        //     ->where('doctor_id', $doctorId)
        //     ->orderBy('id', 'desc')
        //     ->get();

        // $patient_laboratories = Laboratorie::where('patient_id', $id)
        //     ->where('doctor_id', $doctorId)
        //     ->orderBy('id', 'desc')
        //     ->get();





        return view('dashboard.doctors.invoices.patient_details', compact('patient_records', 'patient_rays', 'patient_laboratories'));
    }


    public function addReview($request)
    {
        DB::beginTransaction();

        try {


            $this->invoice_status($request->invoice_id, 2);

            $diagnosis = new Diagnostic();
            $diagnosis->date = date('Y-m-d');
            $diagnosis->review_date = date('Y-m-d H:i:s');
            $diagnosis->diagnosis = $request->diagnosis;
            $diagnosis->medicine = $request->medicine;
            $diagnosis->invoice_id = $request->invoice_id;
            $diagnosis->patient_id = $request->patient_id;
            $diagnosis->doctor_id = $request->doctor_id;
            $diagnosis->save();

            DB::commit();
            flash()->success('تم اضافة التشخيض بنجاح.');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function invoice_status($invoice_id, $id_status)
    {
        $invoice_status = Invoice::findorFail($invoice_id);
        $invoice_status->update([
            'invoice_status' => $id_status
        ]);
    }
}
