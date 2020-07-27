<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntrianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_dokter');
            $table->unsignedBigInteger('id_pasien');
            $table->date('tgl_antri');
            $table->string('status',20);
            $table->string('no_antri');
            $table->timestamps();

            $table->foreign('id_dokter')->references('id')->on('dokter')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

            $table->foreign('id_pasien')->references('id')->on('pasien')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antrian');
    }
}
