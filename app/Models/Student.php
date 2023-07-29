<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function rPhone()
    {
       // return $this->hasOne(Phone::class); // 1:1
        
        return $this->hasMany(Phone::class);
    }

    
}
