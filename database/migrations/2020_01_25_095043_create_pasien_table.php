<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_pengenal',18);
            $table->string('jenis_p',20);
            $table->string('nm_pasien',100);
            $table->string('jenkel',11);
            $table->string('gol_darah',2);
            $table->string('tempat',110);
            $table->date('tgl_lahir');
            $table->integer('umur');
            $table->string('no_hp',13);
            $table->text('alamat');
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
        Schema::dropIfExists('pasien');
    }
}
