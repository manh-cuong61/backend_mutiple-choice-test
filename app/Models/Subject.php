<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exam;
use App\Models\User;

class Subject extends Model
{
    use HasFactory;

    public function exams(){
        $this->hasMany(Exam::class, 'id', 'subject_id');
    }

    public function users(){
        $this->belongsToMany(User::class, 'user_subjects');
    }
}
