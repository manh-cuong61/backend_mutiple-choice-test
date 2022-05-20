<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::factory(400)
        ->sequence(function($sequence) {
            return [
                'question_id' => Question::all()->random(),
            ];
        })->create();
    }
}
