<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerilakusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perilakus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_santri');
            $table->integer('nilai_sosialisasi');
            $table->integer('nilai_jujur');
            $table->integer('nilai_rajin');
            $table->integer('nilai_bersih');
            $table->integer('nilai_sopan_santun');
            $table->integer('nilai_istikomah');
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
        Schema::dropIfExists('perilakus');
    }
}
