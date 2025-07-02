<?php

use App\Http\Controllers\EncounterController;
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {})->name('dashboard');

Route::prefix('patients')->group(function () {
    Route::get('/', [PatientController::class, 'index'])->name('patients.index');
    Route::get('/{patient}/details', [PatientController::class, 'details'])->name('patient.details');
});

Route::prefix('encounters')->group(function () {
    Route::get('/{encounter}', [EncounterController::class, 'show'])->name('encounters.show');
    Route::post('/{encounter}/unsign', [EncounterController::class, 'unsign'])->name('encounters.unsign');
});
