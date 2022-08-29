<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamars';

    protected $fillable = [
        'id_jenis_kamar',
        'nomor_kamar',
        'keterangan_kamar'
    ];

    public function jenisKamar()
    {
        return $this->belongsTo(JenisKamar::class, 'id_jenis_kamar', 'id');
    }
}
