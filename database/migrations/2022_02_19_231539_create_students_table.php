<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id_student');
            $table->string('matricula', 12);
            $table->string('name', 50);
            $table->string('app', 50);
            $table->string('apm', 50);
            $table->set('gen', ['Femenino', 'Masculino']);
            $table->text('email');
            $table->string('password', 18);
            $table->date('fn');
            $table->text('photo');

            //Groups Foreign Key
            $table->unsignedBigInteger('id_grupo');
            $table->foreign('id_grupo')->references('id_groups')->on('groups');
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
        Schema::dropIfExists('students');
    }
}
