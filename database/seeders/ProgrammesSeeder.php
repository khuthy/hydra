<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Programmes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class ProgrammesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Programmes = new Programmes();
        $Programmes->programme_name = "Programme 1: Financial sustainability";
        $Programmes->institutional_outcome = "Institutional Outcome: Effective and efficient financial resources management";

        $Programmes->programme_description = "Programme 1 Purpose: To ensure effective and efficient delivery of financial management services, to secure funding from the exploitation of collaborative activities and partnerships as well as to generate grant funding.";
        $Programmes->perspective_id = 1;
        $Programmes->save();

    }
}
