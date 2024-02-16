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
        Schema::create('master_subkegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('rekening_program');
            $table->string('nama_program');
            $table->string('rekening_kegiatan');
            $table->string('nama_kegiatan');
            $table->string('rekening_subkegiatan');
            $table->string('nama_subkegiatan');
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
        Schema::dropIfExists('master_subkegiatans');
    }
};
