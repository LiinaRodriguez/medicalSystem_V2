<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Department;
use App\Models\City;

class MedicalCenter extends Component{
    
    public $cities ; 
    public $departments; 
    public $selectedDepartment = NULL;
    public $selectedCity = NULL;

    public function mount(){
        $this->departments = Department::all();
        $this->cities = collect(); 
    }

    public function updatedselectedDepartment($departments){
        $this->cities = City::where('department_id', $departments)->get();
    }

    public function render(){
        return view('livewire.medical-center',[
            'departments' =>  Department::all()
        ]);
    }

    
    public function create(){
        $departments = Department::all();
        $cities = City::all();
        return view('livewire.medical-center', compact('departments', 'cities'));
    }
 
    

}
