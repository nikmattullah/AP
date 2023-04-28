<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class biodata_dosen extends Model
{
    use HasFactory;
    protected $table = 'biodata_dosens';
    protected $guarded = []; 

    public function pengajuan_judul()
    {
        return $this->belongsTo(pengajuan_judul::class);      
    }

}
