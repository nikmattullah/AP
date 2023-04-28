<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai_jaringan extends Model
{
    use HasFactory;

    protected $table = 'nilai_jaringans';
    protected $guarded = [];

    public function biodata_mahasiswa()
    {
        return $this->hasOne(biodata_mahasiswa::class,'id','biodata_mahasiswas_id');
    }
}
