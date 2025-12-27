<?php


namespace App\Repository\Doctor_dashboard\Index;

use App\Interfaces\Doctor_dashboard\Index\IndexRepositoryInterface;
use App\Models\Diagnostic;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Ray;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class IndexRepository implements IndexRepositoryInterface
{

    public function index()
    {
        $data['invoices'] = Invoice::where('doctor_id',auth()->user()->id)->count();
        $data['invoices_no_done'] = Invoice::where('doctor_id',auth()->user()->id)->where('invoice_status',1)->count();
        $data['invoices_is_helf'] = Invoice::where('doctor_id',auth()->user()->id)->where('invoice_status',2)->count();
        $data['invoices_is_done'] = Invoice::where('doctor_id',auth()->user()->id)->where('invoice_status',3)->count();
        
        return view('dashboard.doctors.dashboard', $data);
    }
}
