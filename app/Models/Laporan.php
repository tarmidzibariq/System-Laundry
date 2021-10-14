<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tgl',
        'total_pesanan',
        'total_pendapatan',

    ];
    protected $table = 'laporans';
}
