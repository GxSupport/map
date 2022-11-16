<?php

namespace App\Http\Controllers;

use App\Http\Requests\NurseRequest;
use App\Models\ClinicalCharacteristics;
use App\Models\Concomitan;
use App\Models\Habits;
use App\Models\Medication;
use App\Models\NurseDoc;
use Exception;
use Illuminate\Http\Request;
/**
 * @group Nurse doc
 *
 * APIs for managing users
 */
class NurseController extends Controller
{
    /**
     * Clientni id orqali olish
     */
    public function getNurseDoc($id){
        $data = NurseDoc::where('id', $id)->with('tab1', 'tab2', 'tab3', 'tab4')->first();
        if($data){
            return response()->json([
                'message' => 'success',
                'data' => $data
            ], 200);
        }
    }
    /**
     * Clientni list
     */
    public function getAllNurse(){
       return  NurseDoc::with('tab1', 'tab2', 'tab3', 'tab4')->paginate(10);
    }

    public function main($request){
        $id = $request->main['0']['id'] ?? null;
        try{
            if ($id) {
                $nurse = NurseDoc::where('id', $id)->first();
            }else{
                $nurse = new NurseDoc;
            }
            $nurse->name = $request->main['0']['name'];
            $nurse->surname = $request->main['0']['surname'];
            $nurse->middlename = $request->main['0']['middlename'];
            $nurse->inclusion = $request->main['0']['inclusion'];
            $nurse->repeat = $request->main['0']['repeat'];
            $nurse->ambul_number = $request->main['0']['ambul_number'];
            $nurse->phone = $request->main['0']['phone'];
            $nurse->address = $request->main['0']['address'];
            $nurse->age = $request->main['0']['age'];
            $nurse->birthDate = $request->main['0']['birthDate'];
            $nurse->gender = $request->main['0']['gender'];
            if($id){
                $nurse->update();
                return $this->getNurseDoc($id);
            }
            else{
                $nurse->save();
                return $this->getNurseDoc($nurse->id);
            }
        }catch(Exception $e){
            return response()->json(['messaga'=> $e->getMessage()],500);
        }

    }
    public function tabCreateOrUpdate(NurseRequest $request){
        $active_tab = $request->active_tab;
        if($active_tab == 0){
            return $this->main($request);
        }
        if($active_tab == 1){
            return $this->tab1($request);
        }
        if($active_tab == 2){
            return $this->tab2($request);
        }
        if($active_tab == 3){
            return $this->tab3($request);
        }
        if($active_tab == 4){
            return $this->tab4($request);
        }
        if($active_tab == 5){
            return $this->tab5($request);
        }
        if($active_tab == 6){
            return $this->tab6($request);
        }
        if($active_tab == 7){
            return $this->tab7($request);
        }
        if($active_tab == 8){
            return $this->tab8($request);
        }
        if($active_tab == 9){
            return $this->tab9($request);
        }
        if($active_tab == 10){
            return $this->tab10($request);
        }
        if($active_tab == 11){
            return $this->tab11($request);
        }
    }
    public function tab1($request){
        $id = $request->main['0']['id'];
        $data = ClinicalCharacteristics::where('nurse_doc_id', $id)->first();
        if($data){
            $data->general_state =  $request->tab1['0']['general_state'];
            $data->complaints_shortness =  $request->tab1['0']['complaints_shortness'];
            $data->heartbeat =  $request->tab1['0']['heartbeat'];
            $data->headache =  $request->tab1['0']['headache'];
            $data->pain_heart =  $request->tab1['0']['pain_heart'];
            $data->dizziness =  $request->tab1['0']['dizziness'];
            $data->ad =  $request->tab1['0']['ad'];
            $data->ad_text =  $request->tab1['0']['ad_text'];
            $data->update();
            return $this->getNurseDoc($id);
        }else{
            $data = new ClinicalCharacteristics;
            $data->nurse_doc_id = $id;
            $data->general_state =  $request->tab1['0']['general_state'];
            $data->complaints_shortness =  $request->tab1['0']['complaints_shortness'];
            $data->heartbeat =  $request->tab1['0']['heartbeat'];
            $data->headache =  $request->tab1['0']['headache'];
            $data->pain_heart =  $request->tab1['0']['pain_heart'];
            $data->dizziness =  $request->tab1['0']['dizziness'];
            $data->ad =  $request->tab1['0']['ad'];
            $data->ad_text =  $request->tab1['0']['ad_text'];
            $data->save();
            return $this->getNurseDoc($id);
        }
    }
    public function tab2($request){
        $id = $request->main['0']['id'];
        $data = Concomitan::where('nurse_doc_id', $id)->first();
        if($data){
            $data->a =  $request->tab2['0']['a'];
            $data->b =  $request->tab2['0']['b'];
            $data->c =  $request->tab2['0']['c'];
            $data->d =  $request->tab2['0']['d'];
            $data->e =  $request->tab2['0']['e'];
            $data->f =  $request->tab2['0']['f'];
            $data->g =  $request->tab2['0']['g'];
            $data->h =  $request->tab2['0']['h'];
            $data->i =  $request->tab2['0']['i'];
            $data->k =  $request->tab2['0']['k'];
            $data->l =  $request->tab2['0']['l'];
            $data->m =  $request->tab2['0']['m'];
            $data->n =  $request->tab2['0']['n'];
            $data->o =  $request->tab2['0']['o'];
            $data->p =  $request->tab2['0']['p'];
            $data->q =  $request->tab2['0']['q'];
            return $this->getNurseDoc($id);
        }else{
            $data = new Concomitan;
            $data->nurse_doc_id =  $id;
            $data->a =  $request->tab2['0']['a'];
            $data->b =  $request->tab2['0']['b'];
            $data->c =  $request->tab2['0']['c'];
            $data->d =  $request->tab2['0']['d'];
            $data->e =  $request->tab2['0']['e'];
            $data->f =  $request->tab2['0']['f'];
            $data->g =  $request->tab2['0']['g'];
            $data->h =  $request->tab2['0']['h'];
            $data->i =  $request->tab2['0']['i'];
            $data->k =  $request->tab2['0']['k'];
            $data->l =  $request->tab2['0']['l'];
            $data->m =  $request->tab2['0']['m'];
            $data->n =  $request->tab2['0']['n'];
            $data->o =  $request->tab2['0']['o'];
            $data->p =  $request->tab2['0']['p'];
            $data->q =  $request->tab2['0']['q'];
            $data->save();
            return $this->getNurseDoc($id);
        }
    }
    public function tab3($request){
        $id = $request->main['0']['id'];
        $data = Medication::where('nurse_doc_id', $id)->first();
        if($data){
            $data->diuretics =  $request->tab3['0']['diuretics'];
            $data->betaBlockers =  $request->tab3['0']['betaBlockers'];
            $data->calcium =  $request->tab3['0']['calcium'];
            $data->apf =  $request->tab3['0']['apf'];
            $data->ara =  $request->tab3['0']['ara'];
            $data->amkr =  $request->tab3['0']['amkr'];
            $data->antiarrhythmics =  $request->tab3['0']['antiarrhythmics'];
            $data->nitrates =  $request->tab3['0']['nitrates'];
            $data->cardiac =  $request->tab3['0']['cardiac'];
            $data->update();
            return $this->getNurseDoc($id);
        }else{
            $data = new Medication;
            $data->nurse_doc_id = $id;
            $data->diuretics =  $request->tab3['0']['diuretics'];
            $data->betaBlockers =  $request->tab3['0']['betaBlockers'];
            $data->calcium =  $request->tab3['0']['calcium'];
            $data->apf =  $request->tab3['0']['apf'];
            $data->ara =  $request->tab3['0']['ara'];
            $data->amkr =  $request->tab3['0']['amkr'];
            $data->antiarrhythmics =  $request->tab3['0']['antiarrhythmics'];
            $data->nitrates =  $request->tab3['0']['nitrates'];
            $data->cardiac =  $request->tab3['0']['cardiac'];
            $data->save();
            return $this->getNurseDoc($id);
        }

    }
    public function tab4($request){
        $id = $request->main['0']['id'];
        $data = Habits::where('nurse_doc_id', $id)->first();
        if($data){
            $data->alcohol =  $request->tab4['0']['alcohol'];
            $data->smoking =  $request->tab4['0']['smoking'];
            $data->gb =  $request->tab4['0']['gb'];
            $data->ibs =  $request->tab4['0']['ibs'];
            $data->sd =  $request->tab4['0']['sd'];
            $data->ssz =  $request->tab4['0']['ssz'];
            $data->update();
            return $this->getNurseDoc($id);
        }else{
            $data = new Habits;
            $data->nurse_doc_id = $id;
            $data->alcohol =  $request->tab4['0']['alcohol'];
            $data->smoking =  $request->tab4['0']['smoking'];
            $data->gb =  $request->tab4['0']['gb'];
            $data->ibs =  $request->tab4['0']['ibs'];
            $data->sd =  $request->tab4['0']['sd'];
            $data->ssz =  $request->tab4['0']['ssz'];
            $data->save();
            return $this->getNurseDoc($id);
        }
    }
}
