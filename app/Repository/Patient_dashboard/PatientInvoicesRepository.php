<?php


namespace App\Repository\Patient_dashboard;

use App\Interfaces\Patient_dashboard\PatientInvoicesRepositoryInterface;
use App\Models\Diagnostic;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Ray;
use App\Models\ReceiptAccount;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class PatientInvoicesRepository implements PatientInvoicesRepositoryInterface
{

    public function invoices()
    {

        $invoices = Invoice::where('patient_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.patients.invoices.invoices', compact('invoices'));
    }

    public function laboratories()
    {

        $laboratories = Laboratorie::where('patient_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.patients.laboratories.laboratories', compact('laboratories'));
    }

    // public function viewLaboratories($id)
    // {

    //     $laboratorie = Laboratorie::findorFail($id);
    //     if ($laboratorie->patient_id != auth()->user()->id) {
    //         return redirect()->route('404');
    //     }
    // return view('dashboard.patients.laboratories.laboratories', compact('laboratories'));
    // }

    public function rays()
    {

        $rays = Ray::where('patient_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.patients.rays.rays', compact('rays'));
    }

    // public function viewRays($id)
    // {
    //     $rays = Ray::findorFail($id);
    //     if ($rays->patient_id != auth()->user()->id) {
    //         return redirect()->route('404');
    //     }
        // return view('dashboard.patients.payments.payments', compact('payments'));
    // }

    public function payments()
    {

        $payments = ReceiptAccount::where('patient_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.patients.payments.payments', compact('payments'));
    }
}
