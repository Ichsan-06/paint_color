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
        Schema::create('formula', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('warna_id');
            $table->unsignedBigInteger('jenis_id');
            $table->string('kode_formula');
            $table->string('galon');
            $table->string('pail');
            $table->timestamps();

            $table->foreign('warna_id')->references('id')->on('warna')->onDelete('cascade');
            $table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formula');
    }
};
