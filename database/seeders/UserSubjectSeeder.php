<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use App\Models\UserSubject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         UserSubject::factory(50)
            ->sequence(function($sequence){
                return [
                    'user_id' => User::all()->random(),
                    'subject_id' => Subject::all()->random()
                ];  
            })->create();
    }
}
