<?php


namespace App\Repository\LaboratorieEmployee_dashboard;

use App\Interfaces\LaboratorieEmployee_dashboard\LaboratorieInvoicesRepositoryInterface;
use App\Models\Diagnostic;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Ray;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaboratorieInvoicesRepository implements LaboratorieInvoicesRepositoryInterface
{

    use UploadTrait;

    public function index()
    {
        $laboratories = Laboratorie::where('case', 0)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.laboratorie_employees.invoices.index', compact('laboratories'));
    }

    public function completed_invoices()
    {
        $laboratories = Laboratorie::where('case', 1)->where('employee_id',auth()->user()->id)->orderBy('id', 'desc')->paginate(15);
        return view('dashboard.laboratorie_employees.invoices.completed_invoices', compact('laboratories'));
    }

    public function edit($id)
    {
        //    $invoice = Ray::findorFail($id);
        //    return view('Dashboard.dashboard_RayEmployee.invoices.add_diagnosis',compact('invoice'));
    }

    public function update($request, $id)
    {

        $laboratorie = Laboratorie::findorFail($id);

        $laboratorie->update([
            'employee_id' => auth()->user()->id,
            'description_employee' => $request->description_employee,
            'case' => 1,
        ]);

        if ($request->hasFile('photos')) {

            foreach ($request->photos as $photo) {
                //Upload img
                $this->verifyAndStoreImageForeach($photo, 'laboratories', 'upload_image', $laboratorie->id, 'App\Models\Laboratorie');
            }
        }

        flash()->success('تم اضافة الاشعة بنجاح.');
        return redirect()->back();


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
