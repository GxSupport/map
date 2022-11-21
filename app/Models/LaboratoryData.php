<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryData extends Model
{
    use HasFactory;
    protected $fillable = [
    'nurse_doc_id',
    'hb',
    'redBloodCells',
    'leukocytes',
    'platelets',
    'speedBlood',
    'glucose',
    'cReactive',
    'urea',
    'creatinine',
    'rapidGlomFilt',
    'levelUricAcidSer',
    'totalCholesterol',
    'triglycerides',
    'lowDensityLipoprotein',
    'highDensityLipoprotein',
    'cHighDensityLipoprotein',
    'coeffAtherogenicity',
    'prothrombinTime',
    'pti',
    'interNormRel',
    'fibrinogen',
    'homocysteine',
    'alt',
    'ast'
    ];
}
