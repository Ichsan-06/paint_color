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
        Schema::create('warna', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('kode_warna',10);
            $table->string('nama_label',10);
            $table->string('nama_warna');
            $table->string('kode_hex');
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
        Schema::dropIfExists('warna');
    }
};
