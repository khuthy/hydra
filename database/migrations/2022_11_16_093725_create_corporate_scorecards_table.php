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
        Schema::create('corporate_scorecards', function (Blueprint $table) {
            $table->id();
            $table->string('corporate_scorecard_type');
            $table->string('app_aop_year');
            $table->foreignId('sp_scorecard_id')->constrained('sp_scorecards')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('corporate_scorecards');
    }
};
