<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NurseDoc;


class Concomitan extends Model
{
    use HasFactory;
    protected $fillable = [
        'a',
        'b',
        'c',
        'd',
        'e',
        'f',
        'g',
        'h',
        'i',
        'k',
        'l',
        'm',
        'n',
        'o',
        'p',
        'q'
    ];
    public function nurse(){
        return $this->belongsTo(NurseDoc::class, 'nurse_doc_id');
    }
}
