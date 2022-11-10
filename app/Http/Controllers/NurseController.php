<?php

namespace App\Http\Controllers;

use App\Models\ClinicalCharacteristics;
use App\Models\Concomitan;
use App\Models\Habits;
use App\Models\Medication;
use App\Models\NurseDoc;
use Exception;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function getNurseDoc($id){
        $data = NurseDoc::where('id', $id)->with('tab1', 'tab2', 'tab3', 'tab4')->first();
        if($data){
            return response()->json([
                'message' => 'success',
                'data' => $data
            ], 200);
        }
    }
    public function insertOrUpdate(Request $request){
        $id = $request->id;
        $active_id = $request->active_tab;
        try{
            if ($id) {
                $nurse = NurseDoc::where('id', $id)->first();
            }else{
                $nurse = new NurseDoc;
            }
            $nurse->name = $request->name;
            $nurse->surname = $request->surname;
            $nurse->middlename = $request->middlename;
            $nurse->date = $request->date;
            $nurse->repeat = $request->repeat;
            $nurse->ambul_number = $request->ambul_number;
            $nurse->phone = $request->phone;
            $nurse->age = $request->age;
            $nurse->birthDate = $request->birthDate;
            $nurse->gender = $request->gender;
            if($id){
                $nurse->update();
                if($active_id){
                    $this->tabCreateOrUpdate($request);
                }
                return response()->json([
                    'message' => 'success',
                    'data' => $nurse
                ], 200);
            }
            else{
                $nurse->save();
                return response()->json([
                    'message' => 'success',
                    'data' => $nurse
                ], 200);
            }
        }catch(Exception $e){
            return response()->json(['messaga'=> $e->getMessage()],500);
        }
    }
    public function tabCreateOrUpdate($request){
        $tab_id = $request->active_tab;
        if($tab_id == 1){
            return $this->tab1($request);
        }
        if($tab_id == 2){
            return $this->tab2($request);
        }
        if($tab_id == 3){
            return $this->tab3($request);
        }
        if($tab_id == 4){
            return $this->tab4($request);
        }
        if($tab_id == 5){
            return $this->tab5($request);
        }
        if($tab_id == 6){
            return $this->tab6($request);
        }
        if($tab_id == 7){
            return $this->tab7($request);
        }
        if($tab_id == 8){
            return $this->tab8($request);
        }
        if($tab_id == 9){
            return $this->tab9($request);
        }
        if($tab_id == 10){
            return $this->tab10($request);
        }
        if($tab_id == 11){
            return $this->tab11($request);
        }
    }
    public function tab1($request){
        $id = $request->id;
        $data = ClinicalCharacteristics::where('nurse_doc_id', $id)->first();
        if($data){
            $data->general_state =  $request->general_state;
            $data->complaints_shortness =  $request->complaints_shortness;
            $data->heartbeat =  $request->heartbeat;
            $data->headache =  $request->headache;
            $data->pain_heart =  $request->pain_heart;
            $data->dizziness =  $request->dizziness;
            $data->ad =  $request->ad;
            $data->ad_text =  $request->ad_text;
            $data->update();
            return true;
        }else{
            $data = new ClinicalCharacteristics;
            $data->nurse_doc_id = $request->id;
            $data->general_state =  $request->general_state;
            $data->complaints_shortness =  $request->complaints_shortness;
            $data->heartbeat =  $request->heartbeat;
            $data->headache =  $request->headache;
            $data->pain_heart =  $request->pain_heart;
            $data->dizziness =  $request->dizziness;
            $data->ad =  $request->ad;
            $data->ad_text =  $request->ad_text;
            $data->save();
            return true;
        }
    }
    public function tab2($request){
        $id = $request->id;
        $data = Concomitan::where('nurse_doc_id', $id)->first();
        if($data){
            $data->a =  $request->a;
            $data->b =  $request->b;
            $data->c =  $request->c;
            $data->d =  $request->d;
            $data->e =  $request->e;
            $data->f =  $request->f;
            $data->g =  $request->g;
            $data->h =  $request->h;
            $data->i =  $request->i;
            $data->j =  $request->j;
            $data->k =  $request->k;
            $data->l =  $request->l;
            $data->m =  $request->m;
            $data->n =  $request->n;
            $data->o =  $request->o;
            $data->p =  $request->p;
            $data->q =  $request->q;
            $data->update();
            return true;
        }else{
            $data = new Concomitan;
            $data->nurse_doc_id =  $request->nurse_doc_id;
            $data->a =  $request->a;
            $data->b =  $request->b;
            $data->c =  $request->c;
            $data->d =  $request->d;
            $data->e =  $request->e;
            $data->f =  $request->f;
            $data->g =  $request->g;
            $data->h =  $request->h;
            $data->i =  $request->i;
            $data->j =  $request->j;
            $data->k =  $request->k;
            $data->l =  $request->l;
            $data->m =  $request->m;
            $data->n =  $request->n;
            $data->o =  $request->o;
            $data->p =  $request->p;
            $data->q =  $request->q;
            $data->save();
            return true;
        }
    }
    public function tab3($request){
        $id = $request->id;
        $data = Medication::where('nurse_doc_id', $id)->first();
        if($data){
            $data->diuretics =  $request->diuretics;
            $data->betaBlockers =  $request->betaBlockers;
            $data->calcium =  $request->calcium;
            $data->apf =  $request->apf;
            $data->ara =  $request->ara;
            $data->amkr =  $request->amkr;
            $data->antiarrhythmics =  $request->antiarrhythmics;
            $data->nitrates =  $request->nitrates;
            $data->cardiac =  $request->cardiac;
            $data->update();
            return true;
        }else{
            $data = new Medication;
            $data->nurse_doc_id = $request->id;
            $data->diuretics =  $request->diuretics;
            $data->betaBlockers =  $request->betaBlockers;
            $data->calcium =  $request->calcium;
            $data->apf =  $request->apf;
            $data->ara =  $request->ara;
            $data->amkr =  $request->amkr;
            $data->antiarrhythmics =  $request->antiarrhythmics;
            $data->nitrates =  $request->nitrates;
            $data->cardiac =  $request->cardiac;
            $data->save();
            return true;
        }
    }
    public function tab4($request){
        $id = $request->id;
        $data = Habits::where('nurse_doc_id', $id)->first();
        if($data){
            $data->alcohol =  $request->alcohol;
            $data->smoking =  $request->smoking;
            $data->gb =  $request->gb;
            $data->ibs =  $request->ibs;
            $data->sd =  $request->sd;
            $data->ssz =  $request->ssz;
            $data->update();
            return true;
        }else{
            $data = new Habits;
            $data->nurse_doc_id = $request->id;
            $data->alcohol =  $request->alcohol;
            $data->smoking =  $request->smoking;
            $data->gb =  $request->gb;
            $data->ibs =  $request->ibs;
            $data->sd =  $request->sd;
            $data->ssz =  $request->ssz;
            $data->save();
            return true;
        }
    }
}
