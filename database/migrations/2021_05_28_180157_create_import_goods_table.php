<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voucher_code');
            $table->dateTime('datetime');
            $table->integer('supplier_id')->unsigned();
            $table->string('import_staff');
            $table->integer('discount')->nullable();
            $table->integer('VAT')->nullable();
            $table->integer('total_money');
            $table->integer('total_payment')->nullable();
            $table->integer('prepayment')->nullable();
            $table->integer('owed_money')->nullable();
            $table->integer('categories_id')->unsigned();
            $table->string('note')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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
        Schema::dropIfExists('import_goods');
    }
}