<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MtsfPriorities;

class MtsfPrioritiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $priorities = [
            ['priority_name' => 'Priority 1: A capable, ethical and developmental stage.'],
            ['priority_name' => 'Priority 2: Economic transformation and Job Creation.'],
            ['priority_name' => 'Priority 3: Education skills and Health.'],
            ['priority_name' => 'Priority 4: To be added'],
            ['priority_name' => 'Priority 5: Human Settlement and Local Government'],
            ['priority_name' => 'Priority 6: Social Cohation and Safe Community'],
            ['priority_name'=>'Priority 7: A better africa and World']
        ];

        collect($priorities)->each(function ($priority) {
            MtsfPriorities::create($priority);
        });
    }
}
