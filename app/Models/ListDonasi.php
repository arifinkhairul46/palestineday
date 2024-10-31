<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListDonasi extends Model
{
    use HasFactory;

    protected $table = 't_donasi_palestineday';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_ortu',
        'nominal_donasi',
        'no_hp',
        'nama_siswa',
        'doa',
        'lokasi',
        'tgl_donasi',
        'status',
        'metode_bayar'
    ];
}
