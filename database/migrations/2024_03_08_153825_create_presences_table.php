<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_code')->constrained('codes')->onDelete('cascade');
            $table->foreignId('id_class')->constrained('classes')->onDelete('cascade');
            $table->foreignId('id_material')->constrained('materials')->onDelete('cascade');
            $table->string('teaching_role');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->integer('duration')->nullable();
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
        Schema::dropIfExists('presences');
    }
}
