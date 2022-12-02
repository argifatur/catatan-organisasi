<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalRapatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_rapat', function (Blueprint $table) {
            $table->id();
            $table->string('judul_rapat');
            $table->string('agenda_rapat');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->date('tanggal');
            // $table->integer('sks');
            $table->string('tempat');
            $table->string('user_id');
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
        Schema::dropIfExists('jadwal_rapat');
    }
}
