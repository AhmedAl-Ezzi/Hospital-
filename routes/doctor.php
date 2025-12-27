<?php

use App\Http\Controllers\Dashboard_Doctor\DiagnosticController;
use App\Http\Controllers\Dashboard_Doctor\IndexController;
use App\Http\Controllers\Dashboard_Doctor\InvoiceController;
use App\Http\Controllers\Dashboard_Doctor\LaboratorieController;
use App\Http\Controllers\Dashboard_Doctor\NotificationAController;
use App\Http\Controllers\Dashboard_Doctor\PatientDetailController;
use App\Http\Controllers\Dashboard_Doctor\RayController;
use Illuminate\Support\Facades\Route;




//################################ dashboard doctor ########################################
// Route::get('/dashboard', function () {
//     return view('dashboard.doctors.dashboard');
// })->middleware(['auth:doctor', 'verified'])->name('dashboard.doctor');



    Route::get('/dashboard', [IndexController::class, 'index'])->name('dashboard.doctor')
    ->middleware(['auth:doctor', 'verified']);


//################################ end dashboard doctor #####################################


Route::middleware(['auth:doctor'])->group(function () {


    //############################# invoices route ##########################################
    Route::resource('invoices', InvoiceController::class);


    //#############################  completed_invoices route ################################################
    Route::get('completed_invoices', [InvoiceController::class, 'completedInvoices'])->name('completed_invoices');

    //############################# review_invoices route ##########################################
    Route::get('review_invoices', [InvoiceController::class, 'reviewInvoices'])->name('review_invoices');



    //############################# diagnostics route ##########################################

    Route::resource('diagnostics', DiagnosticController::class);

    //############################# review_invoices route ##########################################
    Route::post('add_reviews', [DiagnosticController::class, 'addReview'])->name('add_reviews');



    //############################# rays route ##########################################

    Route::resource('rays', RayController::class);


    //############################# Laboratories route ##########################################

    Route::resource('laboratories', LaboratorieController::class);
    // Route::get('show_laboratorie/{id}', [InvoiceController::class, 'showLaboratorie'])->name('show.laboratorie');






});


require __DIR__ . '/auth.php';
