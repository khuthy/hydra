<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcome_output_indicators', function (Blueprint $table) {
            $table->id();
            $table->string('indicator_type');
            $table->string('indicator_title');
            $table->string('indicator_definition');
            $table->string('source_of_data');
            $table->string('method_of_calculation');
            $table->string('Means of verification')->nullable();

            // calculation variables and constant values


            $table->string('assumptions');

            $table->string('disagregation_of_benefitiaries');
            $table->string('spatial_transformation');
            $table->string('calculation_type')->nullable();
            $table->string('reporting_cycle')->nullable();

            $table->string('desired_performance');
            $table->string('indicator_responsibility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outcome_output_indicators');
    }
};
