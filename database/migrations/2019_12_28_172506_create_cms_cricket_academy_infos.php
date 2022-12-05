<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsCricketAcademyInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_cricket_academy_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('student_name');
            $table->string('student_photo');
            $table->string('student_fathers_name');
            $table->string('students_mothers_name');
            $table->text('student_address');
            $table->string('student_education');
            $table->string('student_mobile');
            $table->string('student_fathers_mobile');
            $table->date('admission_date');
            $table->integer('admission_fee');
            $table->boolean('status')->default('1');
            $table->tinyInteger('create_user');
            $table->tinyInteger('update_user')->default('0');
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
        Schema::dropIfExists('cms_cricket_academy_infos');
    }
}
