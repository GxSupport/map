<?php

namespace App\Services;
use App\Models\NurseDoc;
use App\Models\Anthropometrisch;
use App\Models\ClinicalCharacteristics;
use App\Models\Concomitan;
use App\Models\Definition;
use App\Models\EstimatedIndicators;
use App\Models\Habits;
use App\Models\Hemodynamic;
use App\Models\LaboratoryData;
use App\Models\Medication;
use App\Models\ResearchMethod;
use App\Models\StressLevel;
use Exception;

class ClientService
{
    protected $_id;
    public function getNurseDoc($id)
    {
        $data = NurseDoc::where('id', $id)->with('tab1', 'tab2', 'tab3',
                                'tab4','tab5','tab6','tab7','tab8','tab9',
                                'tab10','tab11')->orderBy('id', 'desc')->limit(3)->get();
        if($data){
            return response()->json([
                'message' => 'success',
                'data' => $data
            ], 200);
        }
    }
    public function getAllNurse($request)
    {
        $search = $request->search;
        if($search !=null ){
            $data = NurseDoc::where('name','like',"%$search%")->orWhere('surname','like',"%$search%")
                    ->orWhere('middlename','like',"%$search%")->orwhere('inclusion','like',"%$search%")
                    ->orWhere('ambul_number','like',"%$search%")->orwhere('phone','like',"%$search%")
                    ->orwhere('address','like',"%$search%")->orWhere('birthDate','like',"%$search%")
                    ->orWhere('gender','like',"%$search%")->orWhere('age','like',"%$search%")->paginate(10);
            $message = 'success';
            if(!count($data)){
                $data = null;
                $message = 'bunday client mavjud emas';
            }
        }else{
            $data = NurseDoc::paginate(10);
            $message = 'success';
        }
        return response()->json(['message'=>$message,'data'=>$data]);
    }
    public function main(array $request)
    {
        $id = $request['id'] ?? null;
        try{
            if($id !=null){
                $nurse = NurseDoc::where('id', $id)->first();
                $nurse->update($request);
                return $this->getNurseDoc($id);
            }else{
                $nurse = NurseDoc::create($request);
                return $this->getNurseDoc($nurse->id);
            }
        }catch(Exception $e){
            return response()->json(['message'=> $e->getMessage()],400);
        }
    }
    public function tabCreateOrUpdate($request)
    {
        $active_tab = $request->active_tab;
        $id = $request->main['0']['id'] ?? null;
        if($active_tab == 0){
            return $this->main($request->main['0']);
        }
        if($active_tab == 1){
            return $this->tab($request->tab1['0'], $id, new ClinicalCharacteristics());
        }
        if($active_tab == 2){
            return $this->tab($request->tab2['0'], $id, new Concomitan());
        }
        if($active_tab == 3){
            return $this->tab($request->tab3['0'], $id, new Medication());
        }
        if($active_tab == 4){
            return $this->tab($request->tab4['0'], $id, new Habits());
        }
        if($active_tab == 5){
            return $this->tab($request->tab5['0'], $id, new Hemodynamic());
        }
        if($active_tab == 6){
            return $this->tab($request->tab6['0'], $id, new Anthropometrisch());
        }
        if($active_tab == 7){
            return $this->tab($request->tab7['0'], $id, new LaboratoryData());
        }
        if($active_tab == 8){
            return $this->tab($request->tab8['0'], $id, new Definition());
        }
        if($active_tab == 9){
            return $this->tab($request->tab9['0'], $id, new ResearchMethod());
        }
        if($active_tab == 10){
            return $this->tab($request->tab10['0'], $id, new StressLevel());
        }
        if($active_tab == 11){
            return $this->tab($request->tab11['0'], $id, new EstimatedIndicators());
        }
    }
    public function tab(array $request, int $id, object $model){
        $data = $model::where('nurse_doc_id', $id)->first();
        if($data){
            if($data->finish == '1'){
                return response()->json(['message'=> 'bu clientni malumotlari finish bolgan'], 404);
            }
            $data->update($request);
            return $this->getNurseDoc($id);
        }else{
            $model::create(self::tabInfo($request,$id));
            return $this->getNurseDoc($id);
        }
    }
    protected static function tabInfo(array $data, int $id): array
    {
        $data['nurse_doc_id'] = $id;
        return $data;
    }
    public function finish($request)
    {
        $models = [
            new ClinicalCharacteristics,
            new Concomitan, new Medication,
            new Habits, new Hemodynamic,
            new Anthropometrisch,
            new LaboratoryData,
            new Definition,
            new ResearchMethod,
            new StressLevel,
            new EstimatedIndicators
        ];
        $id = $request->id;
        foreach($models as $model){
            $data = $model::where('nurse_doc_id', $id)->first();
            $data->finish = '1';
            $data->update();
        }
        return response()->json(['message'=>'success'], 200);
    }

}

