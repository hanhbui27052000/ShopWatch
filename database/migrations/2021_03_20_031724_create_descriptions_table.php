<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('descriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('origin')->nullable();
            $table->string('guarantee')->nullable();
            $table->string('wire_color')->nullable();
            $table->string('wire_material')->nullable();
            $table->string('wire_length')->nullable();
            $table->string('wire_thickness')->nullable();
            $table->string('shell_color')->nullable();
            $table->string('shell_diameter')->nullable();
            $table->string('glass_type')->nullable();
            $table->string('water_proof')->nullable();
            $table->string('where_production')->nullable();
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('descriptions');
    }
}