<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Definition extends Model
{
    use HasFactory;
    protected $fillable = [
        'nurse_doc_id',
        'tshx',
        'borgscale',
        'rufierDixontest',
        'rufierDixontest_p1',
        'rufierDixontest_p2',
        'rufierDixontest_p3',
        'bem_sample',
        'levelPhysicalFitness',
        'physical_definition'
    ];
}
