<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perspectives;

class PerspectivesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $perspective = new Perspectives();
        $perspective->perspective_name = "Effective Systems Perspective";
        $perspective->save();

    }
}
