<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_1',
        'assessment_2',
        'assessment_3',
        'assessment_4',
        'assessment_5',
        'assessment_6',
        'total',
    ];
}
