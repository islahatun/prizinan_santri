<?php

use App\Models\Santri;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerizinansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perizinans', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pulang')->required();
            $table->date('tgl_balik')->required();
            $table->date('actual_tgl_balik')->nullable();
            $table->string('alasan_izin', 100)->required();
            $table->string('keterangan', 100)->nullable();
            $table->foreignIdFor(new User())->nullable();
            $table->foreignIdFor(new Santri());
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
        Schema::dropIfExists('perizinans');
    }
}
