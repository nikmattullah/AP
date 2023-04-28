<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_dosens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned();
            $table->string('kd_instruktur',10);
            $table->string('nama',100);
            $table->string('tempat_lahir',100);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('no_hp',15);
            $table->string('email',50);
            $table->string('jenis_kelamin',10); 
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
        Schema::dropIfExists('biodata_dosens');
    }
}
