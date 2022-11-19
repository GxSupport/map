<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StressLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'stress1',
        'stress2',
        'stress3',
        'stress4',
        'stress5',
        'stress6',
        'stress7',
        'stressLevel',
        'mobility',
        'personalCare',
        'dailyActivities',
        'painDiscomfort',
        'anxietyDepression',
        'totalGrade',
        'eqvas'
    ];
}
