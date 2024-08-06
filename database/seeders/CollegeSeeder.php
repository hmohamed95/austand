<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_id = \App\Models\User::first()->id;

        $colleges=  [
            [
                'name' => 'College of Arts and Sciences',
                'short_name' => 'arts',
                'user_id' => $user_id,
            ],

            [
                'name' => 'College of Business and Finance',
                'short_name' => 'business',
                'user_id' => $user_id,
            ],



            [
                'name' => 'College of Engineering',
                'short_name' => 'engineering',
                'user_id' => $user_id,
            ],

            [
                'name' => 'College of Information Technology',
                'short_name' => 'it',
                'user_id' => $user_id,
            ],

            [
                'name' => 'College of Medical and Health Sciences',
                'short_name' => 'medical',
                'user_id' => $user_id,
            ],
        ];


        foreach ($colleges as $college) {
            \App\Models\College::create($college);
        }



    }
}
