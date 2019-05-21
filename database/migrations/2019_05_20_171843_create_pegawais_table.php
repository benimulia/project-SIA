<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nama_pegawai');
            $table->string('alamat_pegawai');
            $table->date('tgl_lahir');
            $table->date('tgl_masuk');
            $table->string('divisi_pegawai');
            $table->string('jabatan_pegawai');
            $table->string('picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
