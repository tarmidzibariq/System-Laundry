<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_outlet',
        'jenis',
        'nama_paket',
        'harga',
    ];
    protected $table = 'pakets';

    public function outlets()
    {
        return $this->belongsTo('App\Models\outlet', 'id_outlet', 'id');
    }
}
