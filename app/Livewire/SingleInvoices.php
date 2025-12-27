<?php

namespace App\Livewire;

use App\Events\MyEvent;
use App\Models\Doctor;
use App\Models\FundAccount;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Patient;
use App\Models\PatientAccount;
use App\Models\Service;
use App\Models\SingleInvoice;
use Livewire\Component;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

class SingleInvoices extends Component
{
    public $show_table = true;
    public $tax_rate = 17;
    public $updateMode = false;
    public $price, $discount_value = 0, $patient_id, $section_name, $doctor_id, $section_id,
        $type, $Service_id, $single_invoice_id, $catchError;
    public function render()
    {
        return view('livewire.single_invoices.single-invoices', [
            // 'single_invoices'=>SingleInvoice::all(),
            // 'single_invoices' => Invoice::orderBy('id', 'desc')->paginate(15),
            'single_invoices' => Invoice::where('invoice_type', 1)->orderBy('id', 'desc')->paginate(15),

            'patients' => Patient::all(),
            'doctors' => Doctor::all(),
            'services' => Service::all(),
            'subtotal' => $Total_after_discount = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'tax_value' => $Total_after_discount * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100)
        ]);
    }

    // public function print($id)
    // {
    //     $single_invoice = SingleInvoice::findorfail($id);
    //     return Redirect::route('Print_single_invoices', [
    //         'invoice_date' => $single_invoice->invoice_date,
    //         'doctor_id' => $single_invoice->Doctor->name,
    //         'section_id' => $single_invoice->Section->name,
    //         'Service_id' => $single_invoice->Service->name,
    //         'type' => $single_invoice->type,
    //         'price' => $single_invoice->price,
    //         'discount_value' => $single_invoice->discount_value,
    //         'tax_rate' => $single_invoice->tax_rate,
    //         'total_with_tax' => $single_invoice->total_with_tax,
    //     ]);
    // }


    public function print($id)
    {
        $single_invoice = Invoice::findorfail($id);
        return Redirect::route('Print_single_invoices', [
            'invoice_date' => $single_invoice->invoice_date,
            'doctor_id' => $single_invoice->Doctor->name,
            'section_id' => $single_invoice->Section->name,
            'Service_id' => $single_invoice->Service->name,
            'type' => $single_invoice->type,
            'price' => $single_invoice->price,
            'discount_value' => $single_invoice->discount_value,
            'tax_rate' => $single_invoice->tax_rate,
            'total_with_tax' => $single_invoice->total_with_tax,
        ]);
    }

    public function show_form_add()
    {
        $this->show_table = false;
    }


    // public function get_section()
    // {
    //     // $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
    //     // $this->section_id = $doctor_id->section->name;

    //     $doctor = Doctor::with('section')->where('id', $this->doctor_id)->first();
    //     if ($doctor && $doctor->section) {
    //         $this->section_id = $doctor->section->id; // Store the ID, not the name
    //     } else {
    //         $this->section_id = null;
    //     }
    // }


    public function get_section()
    {
        $doctor = Doctor::with('section')->find($this->doctor_id);

        if ($doctor && $doctor->section) {
            $this->section_id   = $doctor->section->id;   // للحفظ
            $this->section_name = $doctor->section->name; // للعرض
        } else {
            $this->section_id = null;
            $this->section_name = '';
        }
    }


    public function get_price()
    {
        $this->price = Service::where('id', $this->Service_id)->first()->price;
    }


    //      public function store(){

    //         $single_invoices = new SingleInvoice();
    //         $single_invoices->invoice_date = date('Y-m-d');
    //         $single_invoices->patient_id = $this->patient_id;
    //         $single_invoices->doctor_id = $this->doctor_id;
    //         // $single_invoices->section_id = DB::table('sections')->where('name', $this->section_id)->first()->section_id;
    // $single_invoices->section_id = $this->section_id; // This is now the ID
    //         $single_invoices->Service_id = $this->Service_id;
    //         $single_invoices->price = $this->price;
    //         $single_invoices->discount_value = $this->discount_value;
    //         $single_invoices->tax_rate = $this->tax_rate;
    //         // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
    //         $single_invoices->tax_value = ($this->price -$this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
    //         // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
    //         $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
    //         $single_invoices->type = $this->type;
    //         $single_invoices->save();
    //         flash()->success('تم اضافة فاتورة بنجاح.');
    //         $this->show_table =true;
    //     }



    public function edit($id)
    {

        $this->show_table = false;
        $this->updateMode = true;
        $single_invoice = Invoice::findorfail($id);
        $this->single_invoice_id = $single_invoice->id;
        $this->patient_id = $single_invoice->patient_id;
        $this->doctor_id = $single_invoice->doctor_id;
        $this->section_id = $this->section_id;
        $this->Service_id = $single_invoice->Service_id;
        $this->price = $single_invoice->price;
        $this->discount_value = $single_invoice->discount_value;
        $this->type = $single_invoice->type;
        flash()->addInfo('تم تعديل الفاتوره بنجاح.');
    }







    public function store()
    {

        // في حالة كانت الفاتورة نقدي
        if ($this->type == 1) {

            DB::beginTransaction();
            try {

                // في حالة التعديل
                if ($this->updateMode) {

                    $single_invoices = Invoice::findorfail($this->single_invoice_id);
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = $this->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();

                    $fund_accounts = FundAccount::where('invoice_id', $this->single_invoice_id)->first();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->invoice_id = $single_invoices->id;
                    $fund_accounts->Debit = $single_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();
                    flash()->addInfo('تم تعديل الفاتوره بنجاح.');
                    $this->show_table = true;
                }

                // في حالة الاضافة
                else {

                    $single_invoices = new Invoice();
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = $this->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->invoice_status = 1;
                    $single_invoices->save();

                    $fund_accounts = new FundAccount();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->invoice_id = $single_invoices->id;
                    $fund_accounts->Debit = $single_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();

                    // **إضافة إشعار هنا**
                    // Notification::create([
                    //     'doctor_id' => auth()->user()->id,
                    //     'message' => "تمت إضافة فاتورة نقدية رقم #{$single_invoices->id}",
                    //     'reader_status' => 0
                    // ]);


                    // **إضافة إشعار هنا**
                    // $patient = Patient::find($single_invoices->patient_id);

                    // Notification::create([
                    //     'doctor_id' => $single_invoices->doctor_id, // الدكتور صاحب الفاتورة فقط
                    //     'message'   => 'فاتورة جديدة',
                    //     'description' => 'اسم المريض: ' . ($patient->name ?? 'غير معروف'),
                    //     'created_at' => now(),
                    //     'reader_status' => 0
                    // ]);




                    // **إضافة إشعار هنا**
                    $patient = Patient::find($single_invoices->patient_id);

                    Notification::create([
                        // 'doctor_id'   => $single_invoices->doctor_id,
                        'doctor_id' => auth()->user()->id,
                        'message'     => 'فاتورة جديدة',
                        'description' => 'اسم المريض: ' . ($patient->name ?? 'غير معروف'),
                        'reader_status' => 0
                    ]);


            //   $data=[
            //             'patient_id'=>$this->patient_id,
            //             'invoice_id'=>$single_invoices->id,
            //         ];

                            // event(new MyEvent($data));


//                             event(new MyEvent(
//     $single_invoices->doctor_id,
//     $single_invoices->patient_id,
//     $single_invoices->id
// ));



                    flash()->success('تم اضافة فاتورة بنجاح.');
                    $this->show_table = true;

                    // $data=[
                    //     'patient_id'=>$this->patient_id,
                    //     'invoice_id'=>$single_invoices->id,
                    // ];

                    //         event(new MyEvent($data));

                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                $this->catchError = $e->getMessage();
            }
        }


        //------------------------------------------------------------------------

        // في حالة كانت الفاتورة اجل
        else {

            DB::beginTransaction();
            try {

                // في حالة التعديل
                if ($this->updateMode) {

                    $single_invoices = Invoice::findorfail($this->single_invoice_id);
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = $this->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();


                    $patient_accounts = PatientAccount::where('invoice_id', $this->single_invoice_id)->first();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->invoice_id = $single_invoices->id;
                    $patient_accounts->patient_id = $single_invoices->patient_id;
                    $patient_accounts->Debit = $single_invoices->total_with_tax;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();
                    flash()->addInfo('تم تعديل الفاتوره بنجاح.');
                    $this->show_table = true;
                }

                // في حالة الاضافة
                else {

                    $single_invoices = new Invoice();
                    $single_invoices->invoice_type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = $this->section_id;
                    $single_invoices->Service_id = $this->Service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    // قيمة الضريبة = السعر - الخصم * نسبة الضريبة /100
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    // الاجمالي شامل الضريبة  = السعر - الخصم + قيمة الضريبة
                    $single_invoices->total_with_tax = $single_invoices->price -  $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->invoice_status = 1;
                    $single_invoices->save();

                    $patient_accounts = new PatientAccount();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->invoice_id = $single_invoices->id;
                    $patient_accounts->patient_id = $single_invoices->patient_id;
                    $patient_accounts->Debit = $single_invoices->total_with_tax;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();

                    // Notification::create([
                    //     'doctor_id' => auth()->user()->id,
                    //     'message' => "تمت إضافة فاتورة نقدية رقم #{$single_invoices->id}",
                    //     'reader_status' => 0
                    // ]);


                    // **إضافة إشعار هنا**
                    // $patient = Patient::find($single_invoices->patient_id);

                    // Notification::create([
                    //     'doctor_id' => $single_invoices->doctor_id,
                    //     'message'   => 'فاتورة جديدة',
                    //     'description' => 'اسم المريض: ' . ($patient->name ?? 'غير معروف'),
                    //     'created_at' => now(),
                    //     'reader_status' => 0
                    // ]);





                    // **إضافة إشعار هنا**
                    $patient = Patient::find($single_invoices->patient_id);

                    Notification::create([
                        'doctor_id'   => $single_invoices->doctor_id,
                        'message'     => 'فاتورة جديدة',
                        'description' => 'اسم المريض: ' . ($patient->name ?? 'غير معروف'),
                        'reader_status' => 0
                    ]);


                    //    $data=[
                    //     'patient_id'=>$this->patient_id,
                    //     'invoice_id'=>$single_invoices->id,
                    // ];

                    //         event(new MyEvent($data));


                    flash()->success('تم اضافة فاتورة بنجاح.');
                    $this->show_table = true;






                }

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
        }
    }



    public function delete($id)
    {

        $this->single_invoice_id = $id;
    }

    public function destroy()
    {
        SingleInvoice::destroy($this->single_invoice_id);
        flash()->addWarning('تم حذف بيانات الفاتورة بنجاح.');
        return redirect()->route('single_invoices');
    }
}
