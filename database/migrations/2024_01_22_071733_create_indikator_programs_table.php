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
        Schema::create('indikator_programs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_rekening');
            $table->string('nama_program');
            $table->string('indikator');
            $table->string('target');
            $table->string('satuan');
            $table->string('pagu');
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
        Schema::dropIfExists('indikator_programs');
    }
};
