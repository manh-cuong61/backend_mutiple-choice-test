<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\User;
use App\Models\UserExam;
use Illuminate\Database\Seeder;

class UserExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserExam::factory(50)
        ->sequence(function($sequence) {
            return [
                'user_id' => User::all()->random(),
                'exam_id' => Exam::all()->random(),
            ];
        })->create();
    }
}
