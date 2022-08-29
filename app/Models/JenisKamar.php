<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKamar extends Model
{
    use HasFactory;

    protected $table = 'jenis_kamars';

    protected $fillable = [
        'nama'
    ];

    public function reservasi()
    {
        $this->hasMany(Reservasi::class);
    }

    public function kamar()
    {
        $this->hasMany(Kamar::class);
    }
}
