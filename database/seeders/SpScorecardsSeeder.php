<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SpScorecards;

class SpScorecardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $spscorecards = [
            ['strategic_year' => '2015 - 2020'],
            ['strategic_year' => '2020 - 2025'],
        ];

        collect($spscorecards)->each(function ($spscorecard) {
            SpScorecards::create($spscorecard);
        });
    }
}
