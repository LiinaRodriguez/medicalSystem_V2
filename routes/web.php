<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpecialtyController;
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


//Specialty routes
    Route::get('/especialidades', [SpecialtyController::class, 'index']);

//crear 
    Route::get('/especialidades/create', [SpecialtyController::class, 'create']);
//editar
    Route::get('/especialidades/{specialty}/edit', [SpecialtyController::class, 'edit']);
//enviar datos
    Route::post('/especialidades', [SpecialtyController::class, 'sendData']);   
//actualizar datos
    Route::put('/especialidades/{specialty}', [SpecialtyController::class, 'update']);   
// eliminar datos
    Route::delete('/especialidades/{specialty}', [SpecialtyController::class, 'destroy']);   


//Medicos 
    Route::resource('medicos', 'App\Http\Controllers\DoctorController'); 

//Pacientes 
    Route::resource('pacientes', 'App\Http\Controllers\PatientController');
