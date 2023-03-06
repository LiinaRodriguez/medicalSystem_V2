<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Specialty; 

class AppointmentController extends Controller{
    
    public function create(){
        $specialties = Specialty::all(); 
        return view('appointments.create', compact('specialties')); 
    }
}
