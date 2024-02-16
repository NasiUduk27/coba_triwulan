<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_subkegiatan extends Model
{
    use HasFactory;

    protected $table = 'master_subkegiatans';

    protected $fillable = [
        'rekening_program',
        'nama_program',
        'rekening_kegiatan',
        'nama_kegiatan',
        'rekening_subkegiatan',
        'nama_subkegiatan',
    ];
}
