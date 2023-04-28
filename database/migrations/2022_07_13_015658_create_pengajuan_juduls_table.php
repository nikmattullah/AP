<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajuanJudulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_juduls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('biodata_mahasiswas_id')->unsigned();
            $table->bigInteger('bidang_minats_id')->unsigned();
            $table->bigInteger('users_id')->unsigned();
            $table->bigInteger('biodata_dosens_id')->unsigned();
            $table->text('judul');
            $table->text('deskripsi');
            $table->text('masalah');
            $table->text('solusi');
            $table->integer('status');
            $table->bigInteger('penguji_1')->unsigned();
            $table->bigInteger('penguji_2')->unsigned();
            $table->bigInteger('penguji_3')->unsigned();
            $table->date('tanggal')->nullable();
            $table->time('jam')->nullable();
            $table->string('ruangan',10)->nullable();
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
        Schema::dropIfExists('pengajuan_juduls');
    }
}
