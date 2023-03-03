<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\MedicalCenter;
use App\Http\Controllers\Controller; 

class MedicalCenterController extends Controller{
    
    public function index(){
        $medicalcenters = MedicalCenter::all();
        return view('medicalCenters.index', compact('medicalcenters'));
    }

    public function create(){
        return view('medicalCenters.create'); 
    }
}
