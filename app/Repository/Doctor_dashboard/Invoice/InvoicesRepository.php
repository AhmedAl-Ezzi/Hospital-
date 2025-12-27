<?php


namespace App\Repository\Doctor_dashboard\Invoice;

use App\Interfaces\Doctor_dashboard\Invoice\InvoicesRepositoryInterface;

use App\Models\Invoice;

use Illuminate\Support\Facades\Auth;

class InvoicesRepository implements InvoicesRepositoryInterface
{

    public function index()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 1)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.doctors.invoices.index', compact('invoices'));
    }

    public function completedInvoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 3)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.doctors.invoices.completed_invoices', compact('invoices'));
    }

    public function reviewInvoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 2)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.doctors.invoices.review_invoices', compact('invoices'));
    }

}
