<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator_kinerja extends Model
{
    use HasFactory;

    protected $table = 'indikator_kinerjas';

    protected $fillable = [
        'nomor_rekening',
        'sub_kegiatan',
        'indikator',
        'target',
        'satuan',
        'pagu'
    ];
}
