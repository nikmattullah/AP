<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsulanPerbaikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usulan_perbaikans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('biodata_mahasiswas_id')->unsigned();
            $table->bigInteger('biodata_dosens_id')->unsigned();
            $table->text('usulan_1');
            $table->text('usulan_2');
            $table->text('usulan_3');
            $table->text('usulan_4');
            $table->text('usulan_5');
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
        Schema::dropIfExists('usulan_perbaikans');
    }
}
