<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model{
    use HasFactory;

    public function Cities(){
        return $this->hasMany(City::class, 'department_id');
    }
}
