<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengajuan_judul extends Model
{
    use HasFactory;
    protected $table = "pengajuan_juduls";
    protected $guarded = [];

    public function bidang_minat()
    {
      return $this->hasOne(bidang_minat::class,'id','bidang_minats_id');
    }

    public function biodata_mahasiswa()
    {
      return $this->hasOne(biodata_mahasiswa::class,'id','biodata_mahasiswas_id');
    }
    
    public function biodata_dosen()
    {
      return $this->hasOne(biodata_dosen::class,'id','biodata_dosens_id');
    }
    public function penguji1()
    {
      return $this->hasOne(biodata_dosen::class,'id','penguji_1');
    }
    public function penguji2()
    {
      return $this->hasOne(biodata_dosen::class,'id','penguji_2');
    }
    public function penguji3()
    {
      return $this->hasOne(biodata_dosen::class,'id','penguji_3');
    }
}
