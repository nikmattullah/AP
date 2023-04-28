<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidang_minat extends Model
{
    use HasFactory;
    protected $table="bidang_minats";
    protected $guarded = [];

    public function pengajuan_judul()
    {
        return $this->belongsTo(pengajuan_judul::class);
    }
}
