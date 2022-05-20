<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{
    use HasFactory;

    public function answers(){
        $this->hasMany(Answer::class, 'id', 'question_id');
    }
}
