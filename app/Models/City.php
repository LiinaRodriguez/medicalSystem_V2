<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model{
    use HasFactory;

    public function Department(){
        return $this->belongsTo(Department::class, 'department_id');
    } 
}
