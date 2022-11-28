<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstimatedIndicators extends Model
{
    use HasFactory;
    protected $fillable = [
        'nurse_doc_id',
        'ap',
        'score2OPResult',
        'riskCardioDisease'.
        'any'
    ];
}
