<?php


namespace App\Repository\RayEmployee_dashboard;

use App\Interfaces\RayEmployee_dashboard\RayInvoicesRepositoryInterface;
use App\Models\Diagnostic;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Ray;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class RayInvoicesRepository implements RayInvoicesRepositoryInterface
{

    use UploadTrait;

    public function index()
    {
        $invoices = Ray::where('case', 0)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.ray_employees.invoices.index', compact('invoices'));
    }

    public function completed_invoices()
    {
        // $invoices = Ray::where('case', 1)->where('employee_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
        $invoices = Ray::where('case', 1)->where('employee_id',auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.ray_employees.invoices.completed_invoices', compact('invoices'));
    }

    public function edit($id)
    {
        //    $invoice = Ray::findorFail($id);
        //    return view('Dashboard.dashboard_RayEmployee.invoices.add_diagnosis',compact('invoice'));
    }

    public function update($request, $id)
    {

        $invoice = Ray::findorFail($id);

        $invoice->update([
            'employee_id' => auth()->user()->id,
            'description_employee' => $request->description_employee,
            'case' => 1,
        ]);

        if ($request->hasFile('photos')) {

            foreach ($request->photos as $photo) {
                //Upload img
                $this->verifyAndStoreImageForeach($photo, 'rays', 'upload_image', $invoice->id, 'App\Models\Ray');
            }
        }

        flash()->success('تم اضافة الاشعة بنجاح.');
        return redirect()->back();


        //        if( $request->hasFile( 'photos' ) ) {

        //          foreach ($request->photos as $photo) {
        //              //Upload img
        //             //  $this->verifyAndStoreImageForeach($photo,'Rays','upload_image',$invoice->id,'App\Models\Ray');

        //                 //Upload img
        //             //  $this->verifyAndStoreImage($photo,'rays','upload_image', auth()->user()->id , $invoice->id,'App\Models\Ray');

        //               // Upload img
        //               dd($request->file('photos'));

        //             $this->verifyAndStoreImage($request, 'photo', 'rays', 'upload_image', $invoice->id, 'App\Models\Ray');
        //          }

        //        }


        //               // Upload img
        //             // $this->verifyAndStoreImage($request, 'photo', 'rays', 'upload_image', $invoice->id, 'App\Models\Ray');
        //     flash()->success('تم اضافة الاشعة بنجاح.');
        //     return redirect()->back();



        // if ($request->hasFile('photo')) {

        //     $this->verifyAndStoreImage($request, 'photo', 'Ray', 'upload_image', $request->id, 'App\Models\Ray');
        // }



        // if ($request->hasFile('photos')) {

        //     foreach ($request->file('photos') as $photo) {

        //         $this->verifyAndStoreImageRay(
        //             $photo,                 // ✅ الصورة نفسها
        //             'rays',                 // folder
        //             'upload_image',         // disk
        //             $invoice->id,
        //             \App\Models\Ray::class
        //         );
        //     }
        // }


    }


    public function view_rays($id)
    {
        //    $rays = Ray::findorFail($id);
        //    if($rays->employee_id !=auth()->user()->id){
        //        return view('dashboard.ray_employees.page-404');
        //    }
        //    return view('dashboard.ray_employees.invoices.patient_details', compact('rays'));
    }
}
