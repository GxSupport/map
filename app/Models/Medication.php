<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NurseDoc;

class Medication extends Model
{
    use HasFactory;
    protected $fillable = [
        'nurse_doc_id',
        'diuretics',
        'betaBlockers',
        'calcium',
        'apf',
        'ara',
        'amkr',
        'antiarrhythmics',
        'nitrates',
        'cardiac'
    ];
    public function nurse(){
        return $this->belongsTo(NurseDoc::class, 'nurse_doc_id');
    }
}
