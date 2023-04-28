<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biodata_mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'biodata_mahasiswas';
    protected $guarded = [];
    
    public function jurusan()
{
    return $this->hasOne(jurusan::class,'id','jurusans_id');
}

public function tahun_ajaran()
{
    return $this->hasOne(tahun_ajaran::class,'id','tahun_ajaran_id');
}

public function user()
{
    return $this->hasOne(User::class,'id','users_id');
}

public function pengajuan_judul()
{
    return $this->belongsTo(pengajuan_judul::class);      
}
public function data_bimbingan()
{
    return $this->belongsTo(data_bimbingan::class);      
}
public function nilai_android()
{
    return $this->belongsTo(nilai_android::class);      
}
public function nilai_website()
{
    return $this->belongsTo(nilai_website::class);      
}
public function nilai_jaringan()
{
    return $this->belongsTo(nilai_jaringan::class);      
}
public function usulan_perbaikan()
{
    return $this->belongsTo(usulan_perbaikan::class);      
}
public function nilai_perbaikan()
{
    return $this->belongsTo(nilai_perbaikan::class);      
}
public function total_nilai()
{
    return $this->belongsTo(nilai_perbaikan::class);      
}
}
