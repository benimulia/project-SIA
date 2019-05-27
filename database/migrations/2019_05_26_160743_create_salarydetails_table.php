<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->integer('dept_id')->unsigned();
            $table->integer('division_id')->unsigned();
            $table->integer('salary_id')->unsigned();
            $table->integer('potongan_id')->unsigned();
            $table->integer('tunjangan_id')->unsigned();
            $table->string('PPH');
            $table->float('salary_total');


            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('dept_id')->references('id')->on('departments');
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->foreign('salary_id')->references('id')->on('salaries');
            $table->foreign('potongan_id')->references('id')->on('potongans');
            $table->foreign('tunjangan_id')->references('id')->on('tunjangans');
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
        Schema::dropIfExists('salary_details');
    }
}
