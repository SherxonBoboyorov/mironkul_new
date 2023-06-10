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
        Schema::create('product_video3s', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product3_id')->nullable()->unsigned();
            $table->foreign('product3_id')
            ->references('id')
            ->on('product3s')
            ->onDelete('cascade');

            $table->string('video');
            $table->string('image');

            $table->string('title_ru');
            $table->string('title_uz');
            $table->string('title_en');

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
        Schema::dropIfExists('product_video3s');
    }
};
