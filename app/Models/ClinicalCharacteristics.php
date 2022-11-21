<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NurseDoc;

class ClinicalCharacteristics extends Model
{
    use HasFactory;
    protected $fillable = [
        'nurse_doc_id',
        'general_state',
        'complaints_shortness',
        'heartbeat',
        'headache',
        'pain_heart',
        'dizziness',
        'ad',
        'ad_text',
    ];
    public function nurse(){
        return $this->belongsTo(NurseDoc::class, 'nurse_doc_id');
    }
}
