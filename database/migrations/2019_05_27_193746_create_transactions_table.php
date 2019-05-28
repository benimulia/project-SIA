<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tgl_transaksi');           
            $table->string('keterangan',60);
            $table->integer('account_id')->unsigned();
            $table->integer('penggajian_id')->unsigned();

            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('penggajian_id')->references('id')->on('salary_details');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
