<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;
use App\Models\User;

class Exam extends Model
{
    use HasFactory;
    
    public function questions(){
        $this->hasMany(Question::class, 'id', 'exam_id');
    }

    public function users(){
        $this->belongsToMany(User::class, 'user_exams');
    }

    public function subject(){
        $this->belongsTo(Subject::class, 'id', 'subject_id');
    }

}
