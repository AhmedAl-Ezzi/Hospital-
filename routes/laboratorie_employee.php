<?php

use App\Http\Controllers\Dashboard_Laboratorie_Employee\InvoiceController;
use Illuminate\Support\Facades\Route;




//################################ dashboard doctor ########################################
Route::get('/dashboard', function () {
    return view('dashboard.laboratorie_employees.dashboard');
})->middleware(['auth:laboratorie_employee', 'verified'])->name('dashboard.laboratorie_employee');

//################################ end dashboard doctor #####################################


Route::middleware(['auth:laboratorie_employee'])->group(function () {



    //############################# invoices route ##########################################

    Route::resource('invoices_laboratorie_employees', InvoiceController::class);
    Route::get('completed_invoices', [InvoiceController::class, 'completed_invoices'])->name('completed_invoices_laboratorie');
    // // Route::get('view_rays/{id}', [InvoiceController::class, 'viewRays'])->name('view_rays');
});


require __DIR__ . '/auth.php';
