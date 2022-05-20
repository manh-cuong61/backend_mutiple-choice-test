<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Question::factory(100)
        ->sequence(function($sequence) {
            return [
                'exam_id' => Exam::all()->random(),
            ];
        })->create();
    }
}
