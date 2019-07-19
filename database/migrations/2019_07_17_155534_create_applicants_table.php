<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('uid')->nullable()->unique();
            $table->string('name');
            $table->string('f_name');
            $table->string('fa_name');
            $table->string('SSN')->unique();
            $table->integer('gender')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('mobile')->nullable();
            $table->unsignedBigInteger('university')->nullable();
            $table->foreign('university')
                ->references('id')
                ->on('universities');
            $table->integer('team')->nullable();
            $table->unsignedBigInteger('major')->nullable();
            $table->foreign('major')
                ->references('id')
                ->on('majors');
            $table->integer('card')->nullable();
            $table->string('state')->nullable();
            $table->string('state_note')->nullable();
            $table->string('type')->nullable();
            
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
            
            $table->unsignedBigInteger('dorm')->nullable();
            $table->foreign('dorm')
                ->references('id')
                ->on('dorms');
            $table->integer('d_3')->nullable();
            $table->integer('d_4')->nullable();
            $table->integer('d_5')->nullable();
            $table->integer('d_j')->nullable();
            $table->string('d_room')->nullable();
            
            $table->string('special_case')->nullable();
            $table->string('special_disease')->nullable();

            $table->string('note1')->nullable();
            $table->string('note2')->nullable();

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
        Schema::dropIfExists('applicants');
    }
}
