<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Outcomes;

class OutcomesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $outcomes = [
            ['outcome_name' => 'Effective and Efficient Financial Resources Management'],
            ['outcome_name' => 'Compliance with Government Protocols/Regulations '],
            ['outcome_name' => 'Capable human capital'],
            ['outcome_name'=>'Enhanced Applications of Geoscience Information and Knowledge.'],
            ['outcome_name' => 'Improved of the Geoscience Brands and Services and Products'],
            ['outcome_name' => 'Improved Geoscientific domain through effective knowledge management'],
            ['outcome_name' => 'Enhanced Geoscience Diplomacy'],

        ];

        collect($outcomes)->each(function ($outcome) {
            Outcomes::create($outcome);
        });
    }
}
