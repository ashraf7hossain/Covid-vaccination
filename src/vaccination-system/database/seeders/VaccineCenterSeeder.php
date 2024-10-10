<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vaccineCenters = [
            [
                'name' => 'Health Center A',
                'capacity_per_day' => 10,
                 'next_date' => date('Y-m-d', strtotime('+1 week')),
                 'occupied' => 0
            ],
            [
                'name' => 'Health Center B',
                'capacity_per_day' => 80,
                'next_date' => date('Y-m-d', strtotime('+1 week')),
                'occupied' => 0
            ],
            [
                'name' => 'Health Center C',
                'capacity_per_day' => 20,
                'next_date' => date('Y-m-d', strtotime('+1 week')),
                'occupied' => 0
            ],
            [
                'name' => 'Community Center D',
                'capacity_per_day' => 5,
                'next_date' => date('Y-m-d', strtotime('+1 week')),
                'occupied' => 0
            ],
            [
                'name' => 'Hospital E',
                'capacity_per_day' => 20,
                'next_date' => date('Y-m-d', strtotime('+1 week')),
                'occupied' => 0
            ],
            [
                'name' => 'Clinic F',
                'capacity_per_day' => 7,
                'next_date' => date('Y-m-d', strtotime('+1 week')),
                'occupied' => 0
            ],
            [
                'name' => 'Immunization Center G',
                'capacity_per_day' => 9,
                'next_date' => date('Y-m-d', strtotime('+1 week')),
                'occupied' => 0
            ],
            [
                'name' => 'Vaccination Hub H',
                'capacity_per_day' => 10,
                'next_date' => date('Y-m-d', strtotime('+1 week')),
                'occupied' => 0
            ],
            [
                'name' => 'Pharmacy I',
                'capacity_per_day' => 14,
                'next_date' => date('Y-m-d', strtotime('+1 week')),
                'occupied' => 0
            ],
            [
                'name' => 'Wellness Center J',
                'capacity_per_day' => 11,
                'next_date' => date('Y-m-d', strtotime('+1 week')),
                'occupied' => 0
            ],
        ];

        // Insert vaccine centers into the database
        DB::table('vaccine_centers')->insert($vaccineCenters);
    }
}
