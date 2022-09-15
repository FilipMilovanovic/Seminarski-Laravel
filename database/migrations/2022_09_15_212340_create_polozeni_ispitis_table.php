<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolozeniIspitisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polozeni_ispitis', function (Blueprint $table) {
            $table->id();
            $table->string('student_broj_indeksa')->references('broj_indeksa')->on('users');
            $table->foreignId('ispit_id')->references('id')->on('ispitis');
            $table->integer('ocena');
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
        Schema::dropIfExists('polozeni_ispitis');
    }
}
