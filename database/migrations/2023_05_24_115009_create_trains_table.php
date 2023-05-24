<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('company', 10);
            $table->string('origin', 20);
            $table->string('destiny', 20);
            $table->date('date');
            $table->timeTz('origin_time', $precision = 0);
            $table->timeTz('destiny_time', $precision = 0);
            $table->smallInteger('code')->unsigned();
            $table->tinyInteger('coaches')->unsigned();
            $table->tinyInteger('ontime')->unsigned();
            $table->tinyInteger('canceled')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
