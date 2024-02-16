<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_kegiatan extends Model
{
    use HasFactory;

    protected $table = 'master_kegiatans';

    protected $fillable = [
        'rekening_program',
        'nama_program',
        'rekening_kegiatan',
        'nama_kegiatan',
    ];
}
