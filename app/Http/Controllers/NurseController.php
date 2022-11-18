<?php

namespace App\Http\Controllers;

use App\Http\Requests\NurseRequest;
use App\Models\Anthropometrisch;
use App\Models\ClinicalCharacteristics;
use App\Models\Concomitan;
use App\Models\Definition;
use App\Models\Habits;
use App\Models\Hemodynamic;
use App\Models\LaboratoryData;
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
        $data = NurseDoc::where('id', $id)->with('tab1', 'tab2', 'tab3', 'tab4','tab5','tab6','tab7','tab8')->first();
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
    public function tab2Info($request, int $type, string $id): array
    {
        $data = $request->all();
        if($type == 2){
            $data['nurse_doc_id'] == $id;
        }
        $data['a'] =  $request['a'];
        $data['b'] =  $request['b'];
        $data['c'] =  $request['c'];
        $data['d'] =  $request['d'];
        $data['e'] =  $request['e'];
        $data['f'] =  $request['f'];
        $data['g'] =  $request['g'];
        $data['h'] =  $request['h'];
        $data['i'] =  $request['i'];
        $data['k'] =  $request['k'];
        $data['l'] =  $request['l'];
        $data['m'] =  $request['m'];
        $data['n'] =  $request['n'];
        $data['o'] =  $request['o'];
        $data['p'] =  $request['p'];
        $data['q'] =  $request['q'];
        return $data;
    }
    public function tab2($request){
        $id = $request->main['0']['id'];
        $data = Concomitan::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update($this->tab2Info($request->tab2['0'], 1, $id));
            return $this->getNurseDoc($id);
        }else{
            Concomitan::insert($this->tab2Info($request['0'], 2, $id));
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
    public function tab5Info(array $request, int $type, int $id): array
    {
        // $data = $request->all();
        if($type == 2){
            $data['nurse_doc_id'] = $id;
        }
        $data['sad'] = $request['sad'];
        $data['dad'] = $request['dad'];
        $data['chcc'] = $request['chcc'];
        $data['adp'] = $request['adp'];
        $data['po2Saturation'] = $request['po2Saturation'];
        $data['chdd'] = $request['chdd'];
        $data['auscultationBreathing'] = $request['auscultationBreathing'];
        $data['presenceWheezing'] = $request['presenceWheezing'];
        $data['corTones'] = $request['corTones'];
        $data['noise'] = $request['noise'];
        $data['noiseHas'] = $request['noiseHas'];
        $data['noiseComment'] = $request['noiseComment'];
        $data['presenceEdema'] = $request['presenceEdema'];
        $data['psv'] = $request['psv'];
        return $data;
    }
    public function tab5($request){
        $id = $request->main['0']['id'];
        $data = Hemodynamic::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update($this->tab5Info($request->tab5['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            Hemodynamic::insert($this->tab5Info($request->tab5['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab6($request){
        $id = $request->main['0']['id'];
        $data = Anthropometrisch::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update($this->tab6Info($request->tab6['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            Anthropometrisch::insert($this->tab6Info($request->tab6['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab6Info(array $request, int $type, int $id): array
    {
        if($type == 2){
            $data['nurse_doc_id'] = $id;
        }
        $data['height'] = $request['height'];
        $data['bodyMass'] = $request['bodyMass'];
        $data['waistCircumference'] = $request['waistCircumference'];
        $data['hipCircumference'] = $request['hipCircumference'];
        $data['waistHipRatio'] = $request['waistHipRatio'];
        $data['imt'] = $request['imt'];
        $data['presenceDegreeImt'] = $request['presenceDegreeImt'];
        $data['adiposeTissue'] = $request['adiposeTissue'];
        $data['internalFat'] = $request['internalFat'];
        $data['muscleMass'] = $request['muscleMass'];
        $data['bodyType'] = $request['bodyType'];
        $data['bone'] = $request['bone'];
        $data['exchangeRate'] = $request['exchangeRate'];
        $data['metabolicAge'] = $request['metabolicAge'];
        $data['waterInBody'] = $request['waterInBody'];
        return $data;
    }
    public function tab7($request){
        $id = $request->main['0']['id'];
        $data = LaboratoryData::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update($this->tab7Info($request->tab7['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            LaboratoryData::insert($this->tab7Info($request->tab7['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab7Info(array $request, int $type, int $id): array
    {
        if($type == 2){
            $data['nurse_doc_id'] = $id;
        }
        $data['hb'] = $request['hb'];
        $data['redBloodCells'] = $request['redBloodCells'];
        $data['leukocytes'] = $request['leukocytes'];
        $data['platelets'] = $request['platelets'];
        $data['speedBlood'] = $request['speedBlood'];
        $data['glucose'] = $request['glucose'];
        $data['cReactive'] = $request['cReactive'];
        $data['urea'] = $request['urea'];
        $data['creatinine'] = $request['creatinine'];
        $data['rapidGlomFilt'] = $request['rapidGlomFilt'];
        $data['levelUricAcidSer'] = $request['levelUricAcidSer'];
        $data['totalCholesterol'] = $request['totalCholesterol'];
        $data['triglycerides'] = $request['triglycerides'];
        $data['lowDensityLipoprotein'] = $request['lowDensityLipoprotein'];
        $data['highDensityLipoprotein'] = $request['highDensityLipoprotein'];
        $data['cHighDensityLipoprotein'] = $request['cHighDensityLipoprotein'];
        $data['coeffAtherogenicity'] = $request['coeffAtherogenicity'];
        $data['prothrombinTime'] = $request['prothrombinTime'];
        $data['pti'] = $request['pti'];
        $data['interNormRel'] = $request['interNormRel'];
        $data['fibrinogen'] = $request['fibrinogen'];
        $data['homocysteine'] = $request['homocysteine'];
        return $data;
    }
    public function tab8($request){
        $id = $request->main['0']['id'];
        $data = Definition::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update($this->tab8Info($request->tab8['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            Definition::insert($this->tab8Info($request->tab8['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab8Info(array $request, int $type, int $id): array
    {
        if($type == 2){
            $data['nurse_doc_id'] = $id;
        }
        $data['tshx'] = $request['tshx'];
        $data['borgscale'] = $request['borgscale'];
        $data['rufierDixontest'] = $request['rufierDixontest'];
        $data['rufierDixontest_p1'] = $request['rufierDixontest_p1'];
        $data['rufierDixontest_p2'] = $request['rufierDixontest_p2'];
        $data['rufierDixontest_p3'] = $request['rufierDixontest_p3'];
        $data['bem_sample'] = $request['bem_sample'];
        $data['levelPhysicalFitness'] = $request['levelPhysicalFitness'];
        $data['physical_definition'] = $request['physical_definition'];
        return $data;
    }
}
