<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indikator_program extends Model
{
    use HasFactory;

    protected $table = 'indikator_programs';

    protected $fillable = [
        'nomor_rekening',
        'nama_program',
        'indikator',
        'target',
        'satuan',
        'pagu'
    ];
}
