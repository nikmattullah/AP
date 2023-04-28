<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahun_ajaran extends Model
{
    use HasFactory;

    protected $table = "tahun_ajaran";
    protected $guarded = [];

    public function biodata_mahasiswa()
    { 
      return $this->belongsTo(biodata_mahasiswa::class);
        
    }
}
