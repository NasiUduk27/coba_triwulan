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
        Schema::create('indikator_kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('rekening_program');
            $table->string('kegiatan');
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
        Schema::dropIfExists('indikator_kegiatans');
    }
};
