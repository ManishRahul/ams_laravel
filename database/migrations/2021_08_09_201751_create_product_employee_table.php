<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_employee', function (Blueprint $table) {
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('pro_id');
            $table->timestamps();

            $table->unique(['emp_id','pro_id']);

            $table->foreign('emp_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pro_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_employee');
    }
}
