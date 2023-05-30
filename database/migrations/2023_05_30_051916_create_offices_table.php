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
        Schema::create('offices', function (Blueprint $table) {
            $table->id();

            $table->string('title_ru');
            $table->string('title_uz');
            $table->string('title_en');

            $table->string('addres_ru')->nullable();
            $table->string('addres_uz')->nullable();
            $table->string('addres_en')->nullable();
            $table->string('number')->nullable();
            $table->string('gmail')->nullable();
            $table->string('second_number')->nullable();
            $table->string('second_gmail')->nullable();
            $table->text('map');

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
        Schema::dropIfExists('offices');
    }
};
