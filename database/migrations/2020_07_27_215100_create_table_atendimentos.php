<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAtendimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tipo_id');
            $table->unsignedBigInteger('user_id');
            
            $table->string('cliente');
            $table->text('observacao');
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimentos');
    }
}
