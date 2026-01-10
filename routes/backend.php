<?php

use App\Events\MyEvent;
use App\Http\Controllers\Dashboard\AmbulanceController;
use App\Http\Controllers\Dashboard\AppointmentController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\DoctorController;
use App\Http\Controllers\Dashboard\IndexController;
use App\Http\Controllers\Dashboard\InsuranceController;
use App\Http\Controllers\Dashboard\LaboratorieEmployeeController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\PatientController;
use App\Http\Controllers\Dashboard\PaymentAccountController;
use App\Http\Controllers\Dashboard\RayEmployeeController;
use App\Http\Controllers\Dashboard\ReceiptAccountController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PatientController as ControllersPatientController;
use App\Http\Controllers\PatientController as HttpControllersPatientController;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index']);





//################################ dashboard user ##########################################
Route::get('/dashboard/user', function () {
    return view('dashboard.user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard.user');

//################################ end dashboard user #####################################


//################################ dashboard admin ########################################
// Route::get('/dashboard', function () {
//             event(new MyEvent('hello world'));

//     return view('dashboard.admin.dashboard');
// })->middleware(['auth:admin', 'verified'])->name('dashboard.admin');


Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard.admin')
    ->middleware(['auth:admin', 'verified']);


//################################ end dashboard admin #####################################


Route::middleware(['auth:admin'])->group(function () {

    //################################ Section  ########################################

    Route::resource('sections', SectionController::class);
    Route::get('show_doctors/{id}', [SectionController::class, 'show_doctors'])->name('show_doctors');


    //################################ Doctor  ########################################

    Route::resource('doctors', DoctorController::class);
    Route::post('update_password', [DoctorController::class, 'update_password'])->name('update_password');
    Route::post('update_status', [DoctorController::class, 'update_status'])->name('update_status');


    //################################ Service  ########################################

    Route::resource('services', SingleServiceController::class);

    //############################# GroupServices route ##########################################

    Route::view('add_groupServices', 'livewire.GroupServices.include_create')->name('add_groupServices');

    Route::view('Print_single_invoices', 'livewire.single_invoices.print')->name('Print_single_invoices');

    //############################# insurance route ##########################################

    Route::resource('insurances', InsuranceController::class);

    //############################# Ambulance route ##########################################

    Route::resource('ambulances', AmbulanceController::class);

    //############################# Patients route ##########################################

    Route::resource('patients', PatientController::class);
    Route::get('show_patients/{id}', [PatientController::class, 'show_patients'])->name('show_patients');


    //############################# single_invoices route ##########################################

    Route::view('single_invoices', 'livewire.single_invoices.index')->name('single_invoices');

    //############################# Receipt route ##########################################

    Route::resource('receipts', ReceiptAccountController::class);
    // Route::get('receipt_print/{id}',[ReceiptAccountController::class,'print'])->name('receipt_print');

    //############################# Payment route ##########################################

    Route::resource('payments', PaymentAccountController::class);

    //############################# single_invoices route ##########################################

    Route::view('group_invoices', 'livewire.group_invoices.index')->name('group_invoices');
    Route::view('group_print_single_invoices', 'livewire.group_invoices.print')->name('group_print_single_invoices');


    //############################# RayEmployee route ##########################################

    Route::resource('ray_employees', RayEmployeeController::class);


    //############################# laboratorie_employee route ##########################################

    Route::resource('laboratorie_employees', LaboratorieEmployeeController::class);



    // Route::get('/notifications/fetch', [NotificationController::class, 'fetch'])
    // ->name('notifications.fetch');


    //############################# appointments route ##########################################

    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/approval', [AppointmentController::class, 'index2'])->name('appointments.index2');
    Route::get('appointments/finsh', [AppointmentController::class, 'finsh'])->name('appointments.finsh');
    Route::put('appointments/approval/{id}', [AppointmentController::class, 'approval'])->name('appointments.approval');
    Route::delete('appointments/approval/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');








    // Route::get('/notifications/fetch', [NotificationController::class, 'fetch'])
    //     ->name('notifications.fetch');


    // Route::post('/notifications/mark-as-read', [NotificationController::class, 'markAsRead'])
    //     ->name('notifications.markAsRead');
});


require __DIR__ . '/auth.php';
