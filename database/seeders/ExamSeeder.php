<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Question;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam::factory(10)
        ->sequence(function($sequence) {
            return [
                'subject_id' => Subject::all()->random(),
            ];
        })
        ->create();
    }
}
