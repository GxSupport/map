<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NurseDoc;


class Habits extends Model
{
    use HasFactory;
    public function nurse(){
        return $this->belongsTo(NurseDoc::class, 'nurse_doc_id');
    }
}
