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
            $table->string('uid');
            $table->string('name');
            $table->string('f_name');
            $table->string('SSN');
            $table->string('gender');
            $table->string('district');
            $table->string('city');
            $table->string('mobile')->nullable();
            $table->string('university')->nullable();
            $table->foreign('university')
                ->references('id')
                ->on('universities');
            $table->string('team')->nullable();
            $table->string('major')->nullable();
            $table->foreign('major')
                ->references('id')
                ->on('majors');
            $table->string('card')->nullable();
            $table->string('state')->nullable();
            $table->string('state_note')->nullable();
            $table->string('type')->nullable();
            
            $table->string('3_d')->nullable();
            $table->string('4_b')->nullable();
            $table->string('4_l')->nullable();
            $table->string('4_d')->nullable();
            $table->string('5_b')->nullable();
            $table->string('5_l')->nullable();
            $table->string('5_d')->nullable();
            $table->string('j_b')->nullable();
            $table->string('j_l')->nullable();
            $table->string('j_d')->nullable();
            
            $table->string('dorm')->nullable();
            $table->foreign('dorm')
                ->references('id')
                ->on('dorms');
            $table->string('d_3')->nullable();
            $table->string('d_4')->nullable();
            $table->string('d_5')->nullable();
            $table->string('d_j')->nullable();
            $table->string('d_j')->nullable();
            $table->string('d_room')->nullable();
            
            $table->string('special_case')->nullable();
            $table->string('special_disease')->nullable();
            
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
