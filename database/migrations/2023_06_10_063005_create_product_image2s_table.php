<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_image2s', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product2_id')->nullable()->unsigned();
            $table->foreign('product2_id')
            ->references('id')
            ->on('product2s')
            ->onDelete('cascade');

            $table->string('image');
            
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
        Schema::dropIfExists('product_image2s');
    }
};
