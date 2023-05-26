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
        Schema::create('portfolio_videos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('portfolio_id')->nullable()->unsigned();
            $table->foreign('portfolio_id')
            ->references('id')
            ->on('portfolios')
            ->onDelete('cascade');

            $table->string('video');

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
        Schema::dropIfExists('portfolio_videos');
    }
};
