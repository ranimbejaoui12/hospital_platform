<?php
<<<<<<< HEAD

use Illuminate\Support\Facades\Route;

=======
use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;
Route::resource('patients', PatientController::class);
>>>>>>> 36b2a0c (Doctor Management backend)
Route::get('/', function () {
    return view('welcome');
});
