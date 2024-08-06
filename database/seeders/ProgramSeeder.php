<?php

namespace Database\Seeders;

use App\Enums\ProgramTypeEnum;
use App\Models\College;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $user_id = \App\Models\User::first()->id;

        $undergraduate = ProgramTypeEnum::UNDERGRADUATE;
        $postgraduate = ProgramTypeEnum::POSTGRADUATE;
        $phd = ProgramTypeEnum::PHD;
        $collaborative = ProgramTypeEnum::COLLABORATIVE;

        $it_id = College::where('short_name', 'it')->first()->id;
        $arts_id = College::where('short_name', 'arts')->first()->id;
        $business_id = College::where('short_name', 'business')->first()->id;
        $engineering_id = College::where('short_name', 'engineering')->first()->id;
        $medical_id = College::where('short_name', 'medical')->first()->id;

        $programs = [
            [
                'name' => 'Bachelor of Art in English and Translation',
                'short_name' => 'BAETR',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $arts_id
            ],
            [
                'name' => 'Bachelor’s Degree in Accounting & Finance',
                'short_name' => 'BSAF',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $business_id
            ],
            [
                'name' => 'Bachelor’s Degree in Banking & Finance',
                'short_name' => 'BSBF',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $business_id // Assuming this is a business program
            ],
            [
                'name' => 'Bachelor’s Degree in Computer and Communication Engineering',
                'short_name' => 'BSCCE',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $engineering_id
            ],
            [
                'name' => 'Bachelor’s Degree in Economics & Finance',
                'short_name' => 'BSEF',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $business_id // Assuming this is a business program
            ],
            [
                'name' => 'Bachelor’s Degree in Information Technology',
                'short_name' => 'BSIT',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $it_id
            ],
            [
                'name' => 'Bachelor’s Degree in Management & Marketing',
                'short_name' => 'BSMM',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $business_id
            ],
            [
                'name' => 'Bachelor’s Degree in Management Information Systems',
                'short_name' => 'BSMIS',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $business_id
            ],
            [
                'name' => 'Bachelor’s Degree in Mass Communication & Public Relations',
                'short_name' => 'BSMCPR',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $arts_id
            ],
            [
                'name' => 'Bachelor’s Degree in Mobile and Network Engineering',
                'short_name' => 'BSMNE',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $engineering_id
            ],
            [
                'name' => 'Bachelor’s Degree in Multimedia Systems',
                'short_name' => 'BSMS',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $it_id
            ],
            [
                'name' => 'Bachelor’s Degree in Interior Design',
                'short_name' => 'BSID',
                'user_id' => $user_id,
                'type' => $undergraduate,
                'college_id' => $arts_id
            ],
            [
                'name' => 'Master of Science in Forensic Accounting',
                'short_name' => 'MSFA',
                'user_id' => $user_id,
                'type' => $postgraduate,
                'college_id' => $business_id
            ],
            [
                'name' => 'Master of Science in Intelligent Transportation and Logistics Systems',
                'short_name' => 'MITLS',
                'user_id' => $user_id,
                'type' => $postgraduate,
                'college_id' => $engineering_id
            ],
            [
                'name' => 'Master’s of Science in Financial Technology – FinTech',
                'short_name' => 'MSFT',
                'user_id' => $user_id,
                'type' => $postgraduate,
                'college_id' => $business_id
            ],
            [
                'name' => 'Master’s Degree in Business Administration',
                'short_name' => 'MBA',
                'user_id' => $user_id,
                'type' => $postgraduate,
                'college_id' => $business_id
            ],
            [
                'name' => 'Master’s Degree in Information Technology & Computer Science',
                'short_name' => 'MITCS',
                'user_id' => $user_id,
                'type' => $postgraduate,
                'college_id' => $it_id
            ],
            [
                'name' => 'Master’s Degree in Mass Communication & Public Relations',
                'short_name' => 'MSMCPR',
                'user_id' => $user_id,
                'type' => $postgraduate,
                'college_id' => $arts_id
            ],
            [
                'name' => 'Ph.D. in Digital Media and Communication Technology',
                'short_name' => 'PDMCT',
                'user_id' => $user_id,
                'type' => $phd,
                'college_id' => $it_id
            ],

            [
                'name' => 'The George Washington University Master of Science Degree in Engineering Management',
                'short_name' => 'GWU MS EM',
                'user_id' => $user_id,
                'type' => $collaborative,
                'college_id' => $engineering_id
            ],
        ];

        foreach ($programs as $program) {
            \App\Models\Program::create($program);
        }
    }
}
