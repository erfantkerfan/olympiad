<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('3_d')->nullable();
            $table->integer('4_b')->nullable();
            $table->integer('4_l')->nullable();
            $table->integer('4_d')->nullable();
            $table->integer('5_b')->nullable();
            $table->integer('5_l')->nullable();
            $table->integer('5_d')->nullable();
            $table->integer('j_b')->nullable();
            $table->integer('j_l')->nullable();
            $table->integer('j_d')->nullable();
            $table->integer('dorm')->nullable();
            $table->integer('d_3')->nullable();
            $table->integer('d_4')->nullable();
            $table->integer('d_5')->nullable();
            $table->integer('d_j')->nullable();
            $table->string('d_room')->nullable();
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
        Schema::dropIfExists('universities');
    }
}
