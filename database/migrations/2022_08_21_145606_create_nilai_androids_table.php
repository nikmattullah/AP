<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAndroidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_androids', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('biodata_mahasiswas_id')->unsigned();
            $table->bigInteger('biodata_dosens_id')->unsigned();
            $table->integer('penguji');            
            $table->integer('penulisan');            
            $table->integer('performa');            
            $table->integer('desen_ui');            
            $table->integer('hasil_aplikasi');            
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
        Schema::dropIfExists('nilai_androids');
    }
}
