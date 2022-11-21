<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anthropometrisch extends Model
{
    use HasFactory;
    protected $fillable = [
        'nurse_doc_id',
        'height',
        'bodyMass',
        'waistCircumference',
        'hipCircumference',
        'waistHipRatio',
        'imt',
        'presenceDegreeImt',
        'adiposeTissue',
        'internalFat',
        'muscleMass',
        'bodyType',
        'bone',
        'exchangeRate',
        'metabolicAge',
        'waterInBody'
    ];
}
