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
        Schema::create('corporate_scorecard_indicators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programme_id')->constrained('programmes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('ooi_id')->constrained('outcome_output_indicators')->onUpdate('cascade')->onDelete('cascade');
            $table->string('output');
            $table->string('responsibility');
            $table->string('frequency');
            $table->string('status_of_assessment');
            $table->string('reason_for_deviation');
            $table->string('corrective_action');
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
        Schema::dropIfExists('corporate_scorecard_indicators');
    }
};
