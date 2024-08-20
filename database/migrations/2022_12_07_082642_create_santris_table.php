<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSantrisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 20)->required();
            $table->string('nama', 50)->required();
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->required();
            $table->date('tgl_lahir')->required();
            $table->string('tempat_lahir', 50)->required();
            $table->string('alamat', 100)->required();
            $table->string('kelas', 5)->required();
            $table->string('orang_tua', 50)->required();
            $table->string('no_telepon', 15);
            $table->date('tgl_masuk');
            $table->enum('status', ['bpulang', 'tbpulang'])->required();
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
        Schema::dropIfExists('santris');
    }
}
