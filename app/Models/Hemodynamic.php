<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hemodynamic extends Model
{
    use HasFactory;
    protected $fillable = [
        'nurse_doc_id',
        'sad',
        'dad',
        'chcc',
        'adp',
        'po2Saturation',
        'chdd',
        'auscultationBreathing',
        'presenceWheezing',
        'corTones',
        'noise',
        'noiseHas',
        'noiseComment',
        'presenceEdema',
        'psv'
    ];
}
