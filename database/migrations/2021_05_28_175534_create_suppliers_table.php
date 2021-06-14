<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplier_code');
            $table->string('supplier_name');
            $table->integer('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('image')->nullable();
            $table->integer('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->integer('total_money');
            $table->integer('owed_money');
            $table->integer('tax_code')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('suppliers');
    }
}