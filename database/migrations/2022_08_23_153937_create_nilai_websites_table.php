<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_websites', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('biodata_mahasiswas_id')->unsigned();
            $table->bigInteger('biodata_dosens_id')->unsigned();
            $table->integer('penguji');
            $table->integer('penulisan');            
            $table->integer('template');            
            $table->integer('konten');            
            $table->integer('hosting');            
            $table->integer('penguasaan_project');            
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
        Schema::dropIfExists('nilai_websites');
    }
}
