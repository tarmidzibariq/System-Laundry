<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_outlet',
        'id_paket',
        'kode_invoice',
        'id_member',
        'tgl',
        'batas_waktu',
        'tgl_bayar',
        'biaya',
        'diskon',
        'pajak',
        'status',
        'dibayar',
        'id_user',
    ];
    protected $table = 'transaksis';

    // member
    public function members()
    {
        return $this->belongsTo('App\Models\member', 'id_member', 'id');
    }

    // outlets
    public function outlets()
    {
        return $this->belongsTo('App\Models\outlet', 'id_outlet', 'id');
    }

    // pakets
    public function pakets()
    {
        return $this->belongsTo('App\Models\paket', 'id_paket', 'id');
    }

    // users
    public function users()
    {
        return $this->belongsTo('App\Models\user', 'id_user', 'id');
    }

}
