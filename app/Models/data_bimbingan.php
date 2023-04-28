<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data_bimbingan extends Model
{
    use HasFactory;
    protected $table="data_bimbingans";
    protected $guarded = [];

    public function biodata_mahasiswa()
    {
        return $this->hasOne(biodata_mahasiswa::class,'id','biodata_mahasiswas_id');
    }
}
