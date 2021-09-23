<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'jenis_kelamin',
        'tlp',
        
    ];
    protected $table = 'members';

    // transakis
    public function transaksis()
    {
        return $this->hasMany('App\Models\transaksi');
    } 
}
