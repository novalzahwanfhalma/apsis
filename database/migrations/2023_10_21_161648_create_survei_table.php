<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survei', function (Blueprint $table) {
            $table->increments('id_survei');
            $table->unsignedInteger('id_klien');
            $table->unsignedInteger('id_admin');
            $table->unsignedInteger('jumlah_responden');
            $table->unsignedInteger('poin');
            $table->string('bukti')->unique();
            $table->string('nominal');
            $table->string('judul', 256);
            $table->text('deskripsi');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->enum('status_bayar', ['Belum Bayar', 'Sudah Bayar']);
            $table->enum('status_survei', ['Sortir', 'DIsetujui', 'Dibatalkan']);
            $table->timestamps();

            $table->foreign('id_klien')->references('id_klien')->on('klien')->onDelete('cascade');
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survei');
    }
}
