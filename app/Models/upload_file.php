<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class upload_file extends Model
{
    use HasFactory;
    protected $table="upload_files";
    protected $guarded = [];
}
