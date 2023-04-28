<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned();
            $table->string('nim',20)->unique();
            $table->string('nama',100);
            $table->string('tempat_lahir',100);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('no_hp',15);
            $table->string('email',50);
            $table->string('jenis_kelamin',10);
            $table->string('kelas',5);
            $table->bigInteger('jurusans_id')->unsigned();
            $table->bigInteger('tahun_ajaran_id')->unsigned();
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
        Schema::dropIfExists('biodata_mahasiswas');
    }
}
