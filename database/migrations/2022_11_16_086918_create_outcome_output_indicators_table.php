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
            $table->string('indicator_type')->nullable();
            $table->string('indicator_title')->nullable();
            $table->string('indicator_definition')->nullable();
            $table->string('source_of_data')->nullable();
            $table->string('method_of_calculation')->nullable();
            $table->string('means_of_verification')->nullable();

            // calculation variables and constant values


            $table->string('assumptions')->nullable();

            $table->string('disagregation_of_benefitiaries')->nullable();
            $table->string('spatial_transformation')->nullable();
            $table->string('calculation_type')->nullable();
            $table->string('reporting_cycle')->nullable();

            $table->string('desired_performance')->nullable();
            $table->string('indicator_responsibility')->nullable();
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
