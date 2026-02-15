<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
<<<<<<< HEAD

Route::get('/patients', [PatientController::class, 'index']);
Route::post('/patients', [PatientController::class, 'store']);
=======
use App\Http\Controllers\DoctorController;
Route::get('/patients', [PatientController::class, 'index']);
Route::post('/patients', [PatientController::class, 'store']);
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('doctors', DoctorController::class);
});
>>>>>>> 36b2a0c (Doctor Management backend)
