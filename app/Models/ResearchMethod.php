<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchMethod extends Model
{
    use HasFactory;
    protected $fillable = [
        'ri',
        'si',
        'va',
        'pvA',
        'pvB',
        'pvC',
        'ecgRhythm',
        'ecgRhythmNonSin',
        'heartRate',
        'conclusion'
    ];
}
