<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIspitisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ispitis', function (Blueprint $table) {
            $table->id();
            $table->string('naziv');
            $table->integer('ESPB');
            $table->string('tip');
            $table->string('semestar');
            $table->string('katedra');
            $table->string('profesor');
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
        Schema::dropIfExists('ispitis');
    }
}
