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

    public function updateSelectedDepartment($department){
        $this->cities = City::where('department_id', $department)->get();
    }

    public function render(){
        return view( view: 'livewire.medical-center');
    }
}
