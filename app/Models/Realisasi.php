<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Realisasi extends Model
{
    use HasFactory;

    protected $table = 'realisasis';

    protected $fillable = [
        'nama_program',
        'rekening_kegiatan',
        'nama_kegiatan',
        'rekening_subkegiatan',
        'nama_subkegiatan',
        'indikator',
        'target',
        'satuan',
        'pagu',
        'realisasi',
        'persentase',
        'keterangan',
    ];
}
