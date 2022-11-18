<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Concomitan;
use App\Models\ClinicalCharacteristics;
use App\Models\Habits;
use App\Models\Medication;
use App\Models\Anthropometrisch;
use App\Models\Definition;
use App\Models\Hemodynamic;
use App\Models\LaboratoryData;

class NurseDoc extends Model
{
    use HasFactory;
    public function tab1()
    {
        return $this->hasMany(ClinicalCharacteristics::class, 'nurse_doc_id');
    }
    public function tab2()
    {
        return $this->hasMany(Concomitan::class, 'nurse_doc_id');
    }
    public function tab3()
    {
        return $this->hasMany(Medication::class, 'nurse_doc_id');
    }
    public function tab4()
    {
        return $this->hasMany(Habits::class, 'nurse_doc_id');
    }
    public function tab5()
    {
        return $this->hasMany(Hemodynamic::class, 'nurse_doc_id');
    }
    public function tab6()
    {
        return $this->hasMany(Anthropometrisch::class, 'nurse_doc_id');
    }
    public function tab7()
    {
        return $this->hasMany(LaboratoryData::class, 'nurse_doc_id');
    }
    public function tab8()
    {
        return $this->hasMany(Definition::class, 'nurse_doc_id');
    }
}
