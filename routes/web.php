<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

});

Route::prefix('patients')->group(function () {

    Route::get('/{patient}/details', [PatientController::class, 'details'])->name('patient.details');
});

