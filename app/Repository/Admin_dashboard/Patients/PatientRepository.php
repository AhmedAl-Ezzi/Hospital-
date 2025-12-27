<?php

namespace App\Repository\Admin_dashboard\Patients;

use App\Interfaces\Admin_dashboard\Patients\PatientRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Invoice;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\ReceiptAccount;
use App\Models\Section;
use App\Models\SingleInvoice;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PatientRepository implements PatientRepositoryInterface
{

    public function index()
    {
        $patients = Patient::orderBy('id', 'desc')->paginate(15);
        return view('dashboard.admin.patients.index', compact('patients'));
    }

    public function store(Request $request)
    {

        try {
            $patients = new Patient();
            $patients->name = $request->name;
            $patients->Address = $request->Address;
            $patients->email = $request->email;
            $patients->password = Hash::make($request->Phone);
            $patients->Date_Birth = $request->Date_Birth;
            $patients->Phone = $request->Phone;
            $patients->Gender = $request->Gender;
            $patients->Blood_Group = $request->Blood_Group;
            $patients->save();

            flash()->success('تم اضافة مريض بنجاح.');
            return redirect()->route('patients.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        $patients = Patient::findOrFail($request->id);
        $patients->name = $request->name;
        $patients->Address = $request->Address;
        $patients->email = $request->email;
        $patients->password = Hash::make($request->Phone);
        $patients->Date_Birth = $request->Date_Birth;
        $patients->Phone = $request->Phone;
        $patients->Gender = $request->Gender;
        $patients->Blood_Group = $request->Blood_Group;
        $patients->save();
        flash()->addInfo('تم تعديل المريض بنجاح.');
        return redirect()->route('patients.index');
    }

    public function destroy(Request $request)
    {
        Patient::findOrFail($request->id)->delete();
        flash()->addWarning('تم حذف المريض بنجاح.');
        return redirect()->route('patients.index');
    }

    public function show_patients($id)
    {
        $Patient = patient::findorfail($id);
        $invoices = Invoice::where('patient_id', $id)->get();
        $receipt_accounts = ReceiptAccount::where('patient_id', $id)->get();
        $Patient_accounts = PatientAccount::where('patient_id', $id)->get();

        return view('dashboard.admin.patients.show_patients', compact('Patient', 'invoices', 'receipt_accounts', 'Patient_accounts'));
    }



}
