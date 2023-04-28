<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $table = "jurusans";
    protected $guarded = [];

    public function biodata_mahasiswa()
    {
      return $this->belongsTo(biodata_mahasiswa::class);        
    }

}
