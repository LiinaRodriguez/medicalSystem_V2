<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\MedicalCenterController;
use App\Http\Controllers\Doctor\ScheduleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Midlleware Admin
Route::middleware(['auth', 'admin'])->group(function () {
    
//Specialty routes
    Route::get('/especialidades', [SpecialtyController::class, 'index']);
    Route::get('/especialidades/create', [SpecialtyController::class, 'create']);
    Route::get('/especialidades/{specialty}/edit', [SpecialtyController::class, 'edit']);
    Route::post('/especialidades', [SpecialtyController::class, 'sendData']);   
    Route::put('/especialidades/{specialty}', [SpecialtyController::class, 'update']);   
    Route::delete('/especialidades/{specialty}', [SpecialtyController::class, 'destroy']); 

//Medicos 
    Route::resource('medicos', 'App\Http\Controllers\Admin\DoctorController'); 

//Pacientes 
    Route::resource('pacientes', 'App\Http\Controllers\Admin\PatientController');

//Centros
    Route::get('/centros', [MedicalCenterController::class, 'index']);
    Route::get('/centros/create', [MedicalCenterController::class, 'create']);
    Route::get('/centros/{medicalcenter}/edit', [MedicalCenterController::class, 'edit']);
    Route::post('/centros', [MedicalCenterController::class, 'sendData']);
    Route::put('/centros/{medicalcenter}', [MedicalCenterController::class, 'update']);
    Route::delete('/centros/{medicalcenter}', [MedicalCenterController::class, 'destroy']);

});

//Midlleware Doctor
Route::middleware(['auth', 'medico'])->group(function () {
    Route::get('/horario', [ScheduleController::class, 'edit']);
    Route::post('/horario', [ScheduleController::class, 'store']);


});

//Midlleware Paciente
Route::middleware(['auth', 'paciente'])->group(function () {

});