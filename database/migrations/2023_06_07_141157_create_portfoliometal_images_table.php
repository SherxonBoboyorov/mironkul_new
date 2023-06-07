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
        Schema::create('portfoliometal_images', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('portfoliometal_id')->nullable()->unsigned();
            $table->foreign('portfoliometal_id')
            ->references('id')
            ->on('portfoliometals')
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
        Schema::dropIfExists('portfoliometal_images');
    }
};
