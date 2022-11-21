<?php

namespace App\Services;
use App\Models\NurseDoc;
use App\Models\Anthropometrisch;
use App\Models\ClinicalCharacteristics;
use App\Models\Concomitan;
use App\Models\Definition;
use App\Models\Habits;
use App\Models\Hemodynamic;
use App\Models\LaboratoryData;
use App\Models\Medication;
use App\Models\ResearchMethod;
use App\Models\StressLevel;
use Exception;

class ClientService
{
    public function getNurseDoc($id){
        $data = NurseDoc::where('id', $id)->with('tab1', 'tab2', 'tab3', 'tab4','tab5','tab6','tab7','tab8','tab9','tab10')->first();
        if($data){
            return response()->json([
                'message' => 'success',
                'data' => $data
            ], 200);
        }
    }
    public function getAllNurse(){
        return  NurseDoc::with('tab1', 'tab2', 'tab3', 'tab4','tab5','tab6','tab7','tab8','tab9','tab10')->paginate(10);
    }
    public function main($request){
        $id = $request->main['0']['id'] ?? null;
        try{
            if($id !=null){
                $nurse = NurseDoc::where('id', $id)->first();
                $nurse->update($request->main['0']);
                return $this->getNurseDoc($id);
            }else{
                $nurse = NurseDoc::create($request->main['0']);
                return $this->getNurseDoc($nurse->id);
            }
        }catch(Exception $e){
            return response()->json(['message'=> $e->getMessage()],400);
        }
    }
    public function tabCreateOrUpdate($request){
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
            $data->update(self::tabInfo($request->tab1['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            ClinicalCharacteristics::create(self::tabInfo($request->tab1['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    protected static function tabInfo(array $data, int $type, int $id): array
    {
        if($type == 2){
            $data['nurse_doc_id'] = $id;
        }
        return $data;
    }
    public function tab2($request){
        $id = $request->main['0']['id'];
        $data = Concomitan::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update(self::tabInfo($request->tab2['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            Concomitan::create(self::tabInfo($request->tab2['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab3($request){
        $id = $request->main['0']['id'];
        $data = Medication::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update(self::tabInfo($request->tab3['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            Medication::create(self::tabInfo($request->tab3['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab4($request){
        $id = $request->main['0']['id'];
        $data = Habits::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update(self::tabInfo($request->tab4['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            Habits::create(self::tabInfo($request->tab4['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab5($request){
        $id = $request->main['0']['id'];
        $data = Hemodynamic::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update(self::tabInfo($request->tab5['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            Hemodynamic::create(self::tabInfo($request->tab5['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab6($request){
        $id = $request->main['0']['id'];
        $data = Anthropometrisch::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update(self::tabInfo($request->tab6['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            Anthropometrisch::create(self::tabInfo($request->tab6['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab7($request){
        $id = $request->main['0']['id'];
        $data = LaboratoryData::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update(self::tabInfo($request->tab7['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            LaboratoryData::create(self::tabInfo($request->tab7['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab8($request){
        $id = $request->main['0']['id'];
        $data = Definition::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update(self::tabInfo($request->tab8['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            Definition::create(self::tabInfo($request->tab8['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab9($request){
        $id = $request->main['0']['id'];
        $data = ResearchMethod::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update(self::tabInfo($request->tab9['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            ResearchMethod::create(self::tabInfo($request->tab9['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab10($request){
        $id = $request->main['0']['id'];
        $data = StressLevel::where('nurse_doc_id', $id)->first();
        if($data){
            $data->update(self::tabInfo($request->tab10['0'],1,$id));
            return $this->getNurseDoc($id);
        }else{
            StressLevel::create(self::tabInfo($request->tab10['0'],2,$id));
            return $this->getNurseDoc($id);
        }
    }
    public function tab11(){

    }
}

