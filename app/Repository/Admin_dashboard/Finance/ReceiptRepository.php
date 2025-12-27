<?php


namespace App\Repository\Admin_dashboard\Finance;


use App\Interfaces\Admin_dashboard\Finance\ReceiptRepositoryInterface;
use App\Models\FundAccount;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\ReceiptAccount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReceiptRepository implements ReceiptRepositoryInterface
{

    public function index()
    {
        $receipts =  ReceiptAccount::orderBy('id', 'desc')->paginate(15);
        $patients = Patient::all();
        return view('dashboard.admin.receipts.index', compact('receipts', 'patients'));
    }

    // public function create()
    // {
    //     $Patients = Patient::all();
    //     return view('Dashboard.Receipt.add',compact('Patients'));
    // }

    // public function show($id)
    // {
    //     $receipt = ReceiptAccount::findorfail($id);
    //     return view('Dashboard.Receipt.print',compact('receipt'));
    // }

    public function store($request)
    {

        DB::beginTransaction();

        try {
            // store receipt_accounts
            $receipt_accounts = new ReceiptAccount();
            $receipt_accounts->date = date('y-m-d');
            $receipt_accounts->patient_id = $request->patient_id;
            $receipt_accounts->amount = $request->Debit;
            $receipt_accounts->description = $request->description;
            $receipt_accounts->save();
            // store fund_accounts
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('y-m-d');
            $fund_accounts->receipt_id = $receipt_accounts->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->save();
            // store patient_accounts
            $patient_accounts = new PatientAccount();
            $patient_accounts->date = date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->receipt_id = $receipt_accounts->id;
            $patient_accounts->Debit = 0.00;
            $patient_accounts->credit = $request->Debit;
            $patient_accounts->save();
            DB::commit();
            // session()->flash('add');
            flash()->success('تم اضافة سند بنجاح.');
            return redirect()->route('receipts.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    // public function edit($id)
    // {
    // $receipt_accounts = ReceiptAccount::findorfail($id);
    //     // $Patients = Patient::all();
    //     // return view('dashboard.admin.receipts.index',compact('receipt_accounts'));
    // }

    public function update($request)
    {
        DB::beginTransaction();

        try {
            // store receipt_accounts
            $receipt_accounts = ReceiptAccount::findorfail($request->id);
            $receipt_accounts->date = date('y-m-d');
            $receipt_accounts->patient_id = $request->patient_id;
            $receipt_accounts->amount = $request->Debit;
            $receipt_accounts->description = $request->description;
            $receipt_accounts->save();
            // store fund_accounts
            $fund_accounts = FundAccount::where('receipt_id', $request->id)->first();
            $fund_accounts->date = date('y-m-d');
            $fund_accounts->receipt_id = $receipt_accounts->id;
            $fund_accounts->Debit = $request->Debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->save();
            // store patient_accounts
            $patient_accounts = PatientAccount::where('receipt_id', $request->id)->first();
            $patient_accounts->date = date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->receipt_id = $receipt_accounts->id;
            $patient_accounts->Debit = 0.00;
            $patient_accounts->credit = $request->Debit;
            $patient_accounts->save();


            DB::commit();
            // session()->flash('edit');
            flash()->addInfo('تم تعديل السند بنجاح.');
            return redirect()->route('receipts.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            ReceiptAccount::destroy($request->id);
            flash()->addWarning('تم حذف السند بنجاح.');
            return redirect()->route('receipts.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // public function print($id)
    // {
    //     $receipt = ReceiptAccount::findorfail($id);
    //     return view('dashboard.admin.receipts.print', compact('receipt'));
    // }
}
