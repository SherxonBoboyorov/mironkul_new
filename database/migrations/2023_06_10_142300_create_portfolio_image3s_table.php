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
        Schema::create('portfolio_image3s', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('portfolio3_id')->nullable()->unsigned();
            $table->foreign('portfolio3_id')
            ->references('id')
            ->on('portfolio3s')
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
        Schema::dropIfExists('portfolio_image3s');
    }
};
