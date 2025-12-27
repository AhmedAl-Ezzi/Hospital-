<?php

use App\Http\Controllers\Dashboard_Doctor\DiagnosticController;
use App\Http\Controllers\Dashboard_Doctor\IndexController;
use App\Http\Controllers\Dashboard_Doctor\InvoiceController;
use App\Http\Controllers\Dashboard_Doctor\LaboratorieController;
use App\Http\Controllers\Dashboard_Doctor\PatientDetailController;
use App\Http\Controllers\Dashboard_Doctor\RayController;
use App\Http\Controllers\Dashboard_Patient\PatientController;
use App\Livewire\Chats\CreateChat;
use App\Livewire\Chats\Main;
use Illuminate\Support\Facades\Route;




//################################ dashboard patient ########################################
Route::get('/dashboard', function () {
    return view('dashboard.patients.dashboard');
})->middleware(['auth:patient', 'verified'])->name('dashboard.patient');


Route::middleware(['auth:patient'])->group(function () {


    //############################# patients route ##########################################

    Route::get('invoices', [PatientController::class, 'invoices'])->name('invoices.patient');
    Route::get('laboratories', [PatientController::class, 'laboratories'])->name('laboratories.patient');
    Route::get('rays', [PatientController::class, 'rays'])->name('rays.patient');
    Route::get('payments', [PatientController::class, 'payments'])->name('payments.patient');

    // Route::get('view_laboratories/{id}', [PatientController::class, 'viewLaboratories'])->name('laboratories.view');
    // Route::get('view_rays/{id}', [PatientController::class, 'viewRays'])->name('rays.view');



    //############################# Chat route ##########################################
    Route::get('list/doctors', CreateChat::class)->name('list.doctors');
    Route::get('list/chat/doctors', Main::class)->name('chat.doctors');
});


require __DIR__ . '/auth.php';
