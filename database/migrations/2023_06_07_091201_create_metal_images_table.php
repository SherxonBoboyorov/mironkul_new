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
        Schema::create('metal_images', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('metal_id')->nullable()->unsigned();
            $table->foreign('metal_id')
            ->references('id')
            ->on('metals')
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
        Schema::dropIfExists('metal_images');
    }
};
