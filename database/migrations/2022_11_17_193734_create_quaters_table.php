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
        Schema::create('quaters', function (Blueprint $table) {
            $table->id();
            $table->string('expected_results');
            $table->string('actual_results');
            $table->string('quater_name')->default('Q1');
            $table->foreignId('corporate_scorecard_indicator_id')->constrained('corporate_scorecard_indicators')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('quaters');
    }
};
