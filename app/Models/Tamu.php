<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_depan',
        'nama_belakang',
        'nama_grup',
        'email',
        'telepon',
        'nik',
        'pekerjaan',
        'negara',
        'kota',
        'alamat',
        'kode_pos',
        'is_group'
    ];

    public function reservasi()
    {
        $this->hasMany(Reservasi::class);
    }
}
