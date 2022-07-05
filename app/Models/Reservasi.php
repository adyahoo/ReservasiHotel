<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tamu',
        'id_kamar',
        'id_assessment',
        'check_in',
        'check_out',
        'total_hari_stay',
        'total_dewasa',
        'total_anak',
        'identity',
        'note',
        'note_validasi',
        'status',
    ];
}
