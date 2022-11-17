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
        Schema::create('sp_outcome_indicators', function (Blueprint $table) {
            $table->id();
       // define foreign key
       $table->foreignId('sp_scorecard_id')->constrained('sp_scorecards')->onUpdate('cascade')->onDelete('cascade');
       $table->foreignId('mtsf_priority_id')->constrained('mtsf_priorities')->onUpdate('cascade')->onDelete('cascade');
       $table->foreignId('outcome_id')->constrained('outcomes')->onUpdate('cascade')->onDelete('cascade');
       $table->foreignId('outcome_output_indicator_id')->constrained('outcome_output_indicators')->onUpdate('cascade')->onDelete('cascade');
       $table->foreignId('department_id')->constrained('departments')->onUpdate('cascade')->onDelete('cascade');

       /* normal keys */

       $table->string('baseline')->nullable();
       $table->string('five_year_target')->nullable();
       $table->string('progress')->nullable();
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
        Schema::dropIfExists('sp_outcome_indicators');
    }
};
