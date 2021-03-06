<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Product extends Model
{
    use HasFactory;

    public function employees(){
        return $this->belongsToMany(Employee::class, ProductEmployee::class);
    }
}
