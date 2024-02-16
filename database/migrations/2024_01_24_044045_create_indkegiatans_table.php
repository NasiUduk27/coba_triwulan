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
        Schema::create('indkegiatans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kegiatan');
            $table->string('ind');
            $table->integer('target');
            $table->string('satuan');
            $table->string('anggar');
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
        Schema::dropIfExists('indkegiatans');
    }
};
