<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CorporateScorecardIndicators;

class CorporateScorecardIndicatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $corporateScorecardIndicator = [
           [ 'programme_id' => 1, 'ooi_id' => 1, 'output' => 'Audited financial reports', 'responsibility' => 'Chief Financial Officer', 'frequency' => 'Annually', 'status_of_assessment' => 'clear', 'reason_for_deviation' => 'None', 'corrective_action' => '100%']
        ];

        collect($corporateScorecardIndicator)->each(function ($corporateScorecardIndicator) {
            CorporateScorecardIndicators::create($corporateScorecardIndicator);
        });
    }
}
