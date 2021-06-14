<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voucher_code');
            $table->dateTime('datetime');
            $table->string('staff_create');
            $table->string('payer')->nullable();
            $table->string('customer_name')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->integer('order_id')->nullable()->unsigned();
            $table->integer('total_money');
            $table->integer('customer_pay')->nullable();
            $table->integer('return')->nullable();
            $table->integer('type')->nullable();
            $table->integer('status')->nullable();
            $table->integer('categories_id')->unsigned();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}