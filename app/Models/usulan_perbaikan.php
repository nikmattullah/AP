<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usulan_perbaikan extends Model
{
    use HasFactory;
    protected $table = "usulan_perbaikans";
    protected $guarded = [];

    public function biodata_mahasiswa()
    {
        return $this->hasOne(biodata_mahasiswa::class,'id','biodata_mahasiswas_id');
    }
}
