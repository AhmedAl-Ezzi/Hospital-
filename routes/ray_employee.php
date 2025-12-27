<?php

use App\Http\Controllers\Dashboard_Rey_Employee\InvoiceController;
use Illuminate\Support\Facades\Route;




//################################ dashboard doctor ########################################
Route::get('/dashboard', function () {
    return view('dashboard.ray_employees.dashboard');
})->middleware(['auth:ray_employee', 'verified'])->name('dashboard.ray_employee');

//################################ end dashboard doctor #####################################


Route::middleware(['auth:ray_employee'])->group(function () {



    //############################# invoices route ##########################################
    Route::resource('invoices_ray_employees', InvoiceController::class);
    Route::get('completed_invoices', [InvoiceController::class, 'completed_invoices'])->name('completed_invoices_ray');
    // Route::get('view_rays/{id}', [InvoiceController::class, 'viewRays'])->name('view_rays');
});


require __DIR__ . '/auth.php';
