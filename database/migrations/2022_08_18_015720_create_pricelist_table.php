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
        Schema::create('pricelist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kota_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('jenis_id');
            $table->string('galon');
            $table->string('pail');

            $table->foreign('kota_id')->references('id')->on('kota')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade');
            $table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('cascade');
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
        Schema::dropIfExists('pricelist');
    }
};
