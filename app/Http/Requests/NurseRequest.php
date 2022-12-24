<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NurseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if($this->active_tab == 0){
            return [
                'id' => 'nullable|exists:nurse_docs,id',
                'main' => 'array|required',
                'main.*.name' => 'required|string|min:2',
                'main.*.surname' => 'required|string|min:2',
                'main.*.middlename' => 'nullable|string|min:2',
                'main.*.repeat' => 'required|boolean',
                'main.*.phone' => 'required|string',
                'main.*.age' => 'required|integer',
                'main.*.address' => 'required|string|min:2',
                'main.*.birthDate' => 'required|dateformat:Y-m-d',
                'main.*.gender' => 'required|in:0,1',
            ];
        }elseif($this->active_tab == 1){
            return [
                'id'=>'nullable|',
                'main_id' => 'nullable|exists:nurse_docs,id',
                'tab1' => 'array|required',
                'tab1.*.general_state' => 'nullable|integer|in:1,2,3',
                'tab1.*.complaints_shortness' => 'nullable|integer|in:1,2,3,4',
                'tab1.*.heartbeat' => 'nullable|integer|in:0,1',
                'tab1.*.headache' => 'nullable|integer|in:1,2,3,4',
                'tab1.*.pain_heart' => 'nullable|integer|in:1,2',
                'tab1.*.dizziness' => 'nullable|integer|in:1,2',
                'tab1.*.ad' => 'nullable|integer|in:1,2,3,4,5,6',
                'tab1.*.ad_text' => 'nullable|string',
            ];
        }elseif($this->active_tab == 2){
            return [
                'id'=>'nullable|',
                'main_id' => 'nullable|exists:nurse_docs,id',
                'tab2' => 'array|required',
                'tab2.*.a' => 'nullable|integer|in:0,1',
                'tab2.*.b' => 'nullable|integer|in:0,1',
                'tab2.*.c' => 'nullable|integer|in:0,1',
                'tab2.*.d' => 'nullable|integer|in:0,1',
                'tab2.*.e' => 'nullable|integer|in:0,1',
                'tab2.*.f' => 'nullable|integer|in:0,1',
                'tab2.*.g' => 'nullable|integer|in:1,2,3',
                'tab2.*.h' => 'nullable|integer|in:1,2,3,4,5,6,7',
                'tab2.*.i' => 'nullable|integer|in:0,1',
                'tab2.*.k' => 'nullable|integer|in:0,1',
                'tab2.*.l' => 'nullable|integer|in:0,1',
                'tab2.*.m' => 'nullable|integer|in:0,1',
                'tab2.*.n' => 'nullable|integer|in:0,1',
                'tab2.*.o' => 'nullable|integer|in:0,1',
                'tab2.*.p' => 'nullable|integer|in:0,1',
                'tab2.*.q' => 'nullable|integer|in:0,1',
            ];
        }elseif($this->active_tab == 3){
            return [
                'id'=>'nullable|',
                'main_id' => 'nullable|exists:nurse_docs,id',
                'tab3' => 'required|array',
                'tab3.*.diuretics' => 'nullable|integer|in:0,1',
                'tab3.*.betaBlockers' => 'nullable|integer|in:0,1',
                'tab3.*.calcium' => 'nullable|integer|in:0,1',
                'tab3.*.apf' => 'nullable|integer|in:0,1',
                'tab3.*.ara' => 'nullable|integer|in:0,1',
                'tab3.*.amkr' => 'nullable|integer|in:0,1',
                'tab3.*.antiarrhythmics' => 'nullable|integer|in:0,1',
                'tab3.*.nitrates' => 'nullable|integer|in:0,1',
                'tab3.*.cardiac' => 'nullable|integer|in:0,1',
            ];
        }elseif($this->active_tab == 4){
            return [
                'id'=>'nullable|',
                'main_id' => 'nullable|exists:nurse_docs,id',
                'tab4' => 'required|array',
                'tab4.*.alcohol' => 'nullable|integer|in:1,2,3',
                'tab4.*.smoking' => 'nullable|integer|in:1,2,3',
                'tab4.*.gb' => 'nullable|integer|in:1,2,3,4',
                'tab4.*.ibs' => 'nullable|integer|in:1,2,3,4',
                'tab4.*.sd' => 'nullable|integer|in:1,2,3,4',
                'tab4.*.ssz' => 'nullable|integer|in:1,2,3,4',
            ];
        }elseif ($this->active_tab == 5){
            return [
                'id'=>'nullable|',
                'main_id' => 'nullable|exists:nurse_docs,id',
                'tab5' => 'required|array',
                'tab5.*.sad' => 'nullable|string',
                'tab5.*.dad' => 'nullable|string',
                'tab5.*.chcc' => 'nullable|string',
                'tab5.*.adp' => 'nullable|string',
                'tab5.*.po2Saturation' => 'nullable|string',
                'tab5.*.chdd' => 'nullable|string',
                'tab5.*.auscultationBreathing' => 'nullable|integer|in:1,2,3,4,5,6',
                'tab5.*.presenceWheezing' => 'nullable|integer|in:1,2,3,4,5',
                'tab5.*.corTones' => 'nullable|integer|in:1,2,3',
                'tab5.*.noise' => 'nullable|integer|in:0,1',
                'tab5.*.noiseHas' => 'nullable|integer|in:1,2,3,4,5,6',
                'tab5.*.noiseComment' => 'nullable|string',
                'tab5.*.presenceEdema' => 'nullable|integer|in:1,2',
                'tab5.*.psv' => 'nullable|string',
            ];
        }elseif ($this->active_tab == 6){
            return [
                'id'=>'nullable|',
                'main_id' => 'nullable|exists:nurse_docs,id',
                'tab6' => 'required|array',
                'tab6.*.height' => 'nullable|string',
                'tab6.*.bodyMass' => 'nullable|string',
                'tab6.*.waistCircumference' => 'nullable|string',
                'tab6.*.hipCircumference' => 'nullable|string',
                'tab6.*.waistHipRatio' => 'nullable|string',
                'tab6.*.imt' => 'nullable|string',
                'tab6.*.presenceDegreeImt' => 'nullable|string',
                'tab6.*.adiposeTissue' => 'nullable|string',
                'tab6.*.internalFat' => 'nullable|string',
                'tab6.*.muscleMass' => 'nullable|string',
                'tab6.*.bodyType' => 'nullable|string',
                'tab6.*.bone' => 'nullable|string',
                'tab6.*.exchangeRate' => 'nullable|string',
                'tab6.*.metabolicAge' => 'nullable|string',
                'tab6.*.waterInBody' => 'nullable|string',
            ];
        }elseif($this->active_tab == 7){
            return[

                'id'=>'nullable|',
                'tab7.*.hb' => 'nullable|string',
                'tab7.*.redBloodCells' => 'nullable|string',
                'tab7.*.leukocytes' => 'nullable|string',
                'tab7.*.platelets' => 'nullable|string',
                'tab7.*.speedBlood' => 'nullable|string',
                'tab7.*.glucose' => 'nullable|string',
                'tab7.*.cReactive' => 'nullable|string',
                'tab7.*.urea' => 'nullable|string',
                'tab7.*.creatinine' => 'nullable|string',
                'tab7.*.rapidGlomFilt' => 'nullable|string',
                'tab7.*.alt' => 'nullable|string',
                'tab7.*.ast' => 'nullable|string',
                'tab7.*.levelUricAcidSer' => 'nullable|string',
                'tab7.*.totalCholesterol' => 'nullable|string',
                'tab7.*.triglycerides' => 'nullable|string',
                'tab7.*.lowDensityLipoprotein' => 'nullable|string',
                'tab7.*.highDensityLipoprotein' => 'nullable|string',
                'tab7.*.cHighDensityLipoprotein' => 'nullable|string',
                'tab7.*.coeffAtherogenicity' => 'nullable|string',
                'tab7.*.prothrombinTime' => 'nullable|string',
                'tab7.*.pti' => 'nullable|string',
                'tab7.*.interNormRel' => 'nullable|string',
                'tab7.*.fibrinogen' => 'nullable|string',
                'tab7.*.homocysteine' => 'nullable|string',
            ];
        }elseif($this->active_tab == 8){
            return[
                'id'=>'nullable|',
                'tab8.*.tshx' => 'nullable|string',
                'tab8.*.borgscale' => 'nullable|string',
                'tab8.*.rufierDixontest' => 'nullable|string',
                'tab8.*.rufierDixontest_p1' => 'nullable|string',
                'tab8.*.rufierDixontest_p2' => 'nullable|string',
                'tab8.*.rufierDixontest_p3' => 'nullable|string',
                'tab8.*.bem_sample' => 'nullable|string',
                'tab8.*.levelPhysicalFitness' => 'nullable|string',
                'tab8.*.physical_definition' => 'nullable|string',
                'tab8.*.natureWork' => 'nullable|string',
                'tab8.*.massTest' => 'nullable|string',
                'tab8.*.physicalExercise' => 'nullable|string',
                'tab8.*.pulseRate' => 'nullable|string',
                'tab8.*.complaints' => 'nullable|string',
            ];
        }elseif($this->active_tab == 9){
            return [
                'id'=>'nullable|',
                'main_id' => 'nullable|exists:nurse_docs,id',
                'tab9' => 'required|array',
                'tab9.*.ri' => 'nullable|integer',
                'tab9.*.si' => 'nullable|integer',
                'tab9.*.va' => 'nullable|integer',
                'tab9.*.pvA' => 'nullable|integer|in:0,1',
                'tab9.*.pvB' => 'nullable|integer|in:0,1',
                'tab9.*.pvC' => 'nullable|integer|in:0,1',
                'tab9.*.ecgRhythm' => 'nullable|integer|in:1,2,3,4',
                'tab9.*.ecgRhythmNonSin' => 'nullable|integer|in:1,2',
                'tab9.*.heartRate' => 'nullable|string',
                'tab9.*.conclusion' => 'nullable|string',
            ];
        }elseif ($this->active_tab == 10){
            return [
                'id'=>'nullable|',
                'main_id' => 'nullable|exists:nurse_docs,id',
                'tab10' => 'required|array',
                'tab10.*.stress1' => 'nullable|integer|in:1,2,3,4',
                'tab10.*.stress2' => 'nullable|integer|in:1,2,3,4',
                'tab10.*.stress3' => 'nullable|integer|in:1,2,3,4',
                'tab10.*.stress4' => 'nullable|integer|in:1,2,3,4',
                'tab10.*.stress5' => 'nullable|integer|in:1,2,3,4',
                'tab10.*.stress6' => 'nullable|integer|in:1,2,3,4',
                'tab10.*.stress7' => 'nullable|integer|in:1,2,3,4',
                'tab10.*.stressLevel' => 'nullable|string',
                'tab10.*.mobility' => 'nullable|integer|in:1,2,3',
                'tab10.*.personalCare' => 'nullable|integer|in:1,2,3',
                'tab10.*.dailyActivities' => 'nullable|integer|in:1,2,3',
                'tab10.*.painDiscomfort' => 'nullable|integer|in:1,2,3',
                'tab10.*.anxietyDepression' => 'nullable|integer|in:1,2,3',
                'tab10.*.totalGrade' => 'nullable|string',
                'tab10.*.eqvas' => 'nullable|string',
            ];
        }elseif($this->active_tab == 11){
            return [
                'id'=>'nullable|',
                'main_id' => 'nullable|exists:nurse_docs,id',
                'tab11' => 'required|array',
                'tab11.*.ap' => 'nullable|string',
                'tab11.*.score2OPResult' => 'nullable|string',
                'tab11.*.riskCardioDisease' => 'nullable|string',
                'tab11.*.riskGroup' => 'nullable|in:1,2,3,4',
                'tab11.*.obesity' => 'nullable|in:0,1',
                'tab11.*.diabetes' => 'nullable|in:0,1',
                'tab11.*.physicalActivity' => 'nullable|in:0,1',
                'tab11.*.smoking' => 'nullable|in:0,1',
                'tab11.*.psychologicalStress' => 'nullable|in:0,1',
                'tab11.*.ccz' => 'nullable|in:0,1',
                'tab11.*.hypertension' => 'nullable|in:0,1',
                'tab11.*.fibrillation' => 'nullable|in:0,1',
                'tab11.*.hypertrophy' => 'nullable|in:0,1',
                'tab11.*.disease' => 'nullable|in:0,1',
                'tab11.*.chss' => 'nullable|in:0,1',
                'tab11.*.hyperlipidemia' => 'nullable|in:0,1',
                'tab11.*.hyperuricemia' => 'nullable|in:0,1',
                'tab11.*.factors' => 'nullable|in:0,1',
                'tab11.*.finish' => 'nullable|in:0,1',
            ];
        }else{
            return [
                'active_tab'=>'required|in:0,1,2,3,4,5,6,7,8,9,10,11'
            ];
        }
    }

    public function bodyParameters(){
        return [
            "active_tab" => [
                "description" => "update bolayotgan tabni id si",
                "example" => "1"
            ],
            "main_id" => [
                "description" => "clientni id si",
                "example" => "1"
            ],
            "main" => [
                "description" => "umumiy malumotlar",
                "example" => '[]'
            ],
            'main.*.id'=>[
                'description' => 'main id si faqat update qilish uchun',
                'example'=> '2'
            ],
            'main.*.name'=>[
                'description' => 'name',
                'example'=> 'Yoqubjon'
            ],
            'main.*.surname'=>[
                'description' => 'surname',
                'example'=> 'Tursunxon'
            ],
            'main.*.middlename'=>[
                'description' => 'middlename',
                'example'=> 'Tursunxon'
            ],
            'main.*.address'=>[
                'description' => 'address',
                'example'=> 'Toshkent'
            ],
            'main.*.age'=>[
                'description' => 'age',
                'example'=> '22'
            ],
            'main.*.phone'=>[
                'description' => 'phone',
                'example'=> '998945890598'
            ],
            'main.*.birthDate'=>[
                'description' => '1998-05-26',
                'example'=> '1'
            ],
            'main.*.gender'=>[
                'description' => 'jinsi 0-ayol, 1-erkak',
                'example'=> '1'
            ],
            "tab1" => [
                "description" => "tab 1 ni malumotlari",
                "example" => "[]"
            ],
            'tab1.*.general_state'=>[
                'description' => 'Общее состояние| 1,2,3',
                'example'=> '1'
            ],
            'tab1.*.complaints_shortness'=>[
                'description' => 'Жалобы одышка| 1,2,3,4',
                'example'=> '1'
            ],
            'tab1.*.heartbeat'=>[
                'description' => 'сердцебиение| ',
                'example'=> '14'
            ],
            'tab1.*.headache'=>[
                'description' => 'боли в области сердца |1,2,3,4',
                'example'=> '1'
            ],
            'tab1.*.pain_heart'=>[
                'description' => 'головные боли | 1,2',
                'example'=> '1'
            ],
            'tab1.*.dizziness'=>[
                'description' => 'головокружения | 1,2',
                'example'=> '1'
            ],
            'tab1.*.ad'=>[
                'description' => 'подъёмы АД |1,2,3,4,5,6',
                'example'=> '1'
            ],
            'tab1.*.ad_text'=>[
                'description' => 'дописать',
                'example'=> 'text'
            ],
            "tab2" => [
                "description" => "tab 2",
                "example" => "[]"
            ],
            'tab2.*.a'=>[
                'description' => 'Гипертоническая болезнь',
                'example'=> '1'
            ],
            'tab2.*.b'=>[
                'description' => 'Ишемическая болезнь сердца.',
                'example'=> '1'
            ],
            'tab2.*.c'=>[
                'description' => 'В анамнезе перенесенный ИМ',
                'example'=> '1'
            ],
            'tab2.*.d'=>[
                'description' => 'В анамнезе перенесенный ОНМК, ТИА',
                'example'=> '1'
            ],
            'tab2.*.e'=>[
                'description' => 'ХСН',
                'example'=> '1'
            ],
            'tab2.*.f'=>[
                'description' => 'Атеросклероз периферический многососудистый со стенозом и/или эндоартерэктомии в анамнезе, аневризма аорты',
                'example'=> '1'
            ],
            'tab2.*.g'=>[
                'description' => 'Перенесенные операции на сердце и сосудах',
                'example'=> '1'
            ],
            'tab2.*.h'=>[
                'description' => 'Нарушения ритма',
                'example'=> '1'
            ],
            'tab2.*.i'=>[
                'description' => 'Сахарный диабет без осложнений',
                'example'=> '1'
            ],
            'tab2.*.k'=>[
                'description' => 'Сахарный диабет с осложнениями',
                'example'=> '1'
            ],
            'tab2.*.l'=>[
                'description' => 'Нарушение толерантности к глюкозе',
                'example'=> '1'
            ],
            'tab2.*.m'=>[
                'description' => 'ХБП',
                'example'=> '1'
            ],
            'tab2.*.n'=>[
                'description' => 'ХОБЛ или БА',
                'example'=> '1'
            ],
            'tab2.*.o'=>[
                'description' => 'Ковид-19',
                'example'=> '1'
            ],
            'tab2.*.p'=>[
                'description' => 'Врожденные и приобретенные пороки сердца',
                'example'=> '1'
            ],
            'tab2.*.q'=>[
                'description' => 'Онкологические заболевания',
                'example'=> '1'
            ],

            "tab3" => [
                "description" => "tab 3",
                "example" => "[]"
            ],
            'tab3.*.diuretics'=>[
                'description' => 'диуретики',
                'example'=> '1'
            ],
            'tab3.*.betaBlockers'=>[
                'description' => 'бета-блокаторы',
                'example'=> '1'
            ],
            'tab3.*.calcium'=>[
                'description' => 'антагонисты кальция',
                'example'=> '1'
            ],
            'tab3.*.apf'=>[
                'description' => 'ингибиторы АПФ',
                'example'=> '1'
            ],
            'tab3.*.ara'=>[
                'description' => 'АРА',
                'example'=> '1'
            ],
            'tab3.*.amkr'=>[
                'description' => 'АМКР',
                'example'=> '1'
            ],
            'tab3.*.antiarrhythmics'=>[
                'description' => 'Антиаритмики',
                'example'=> '1'
            ],
            'tab3.*.nitrates'=>[
                'description' => 'Нитраты',
                'example'=> '1'
            ],
            'tab3.*.cardiac'=>[
                'description' => 'Сердечные гликозиды',
                'example'=> '1'
            ],
            "tab4" => [
                "description" => "tab 4",
                "example" => "[]"
            ],
            'tab4.*.alcohol'=>[
                'description' => 'Употребление алкоголя',
                'example'=> '1'
            ],
            'tab4.*.smoking'=>[
                'description' => 'Курение',
                'example'=> '1'
            ],
            'tab4.*.gb'=>[
                'description' => 'Наследственность отягощена или не отягощена',
                'example'=> '1'
            ],
            'tab4.*.ibs'=>[
                'description' => 'Наследственность отягощена или не отягощена',
                'example'=> '1'
            ],
            'tab4.*.sd'=>[
                'description' => 'Наследственность отягощена или не отягощена',
                'example'=> '1'
            ],
            'tab4.*.ssz'=>[
                'description' => 'Наследственность отягощена или не отягощена',
                'example'=> '1'
            ],
            "tab5" => [
                "description" => "tab 5",
                "example" => "[
                    {
                        sad:1,
                        dad:1,
                        chcc:1,
                        adp:1,
                        po2Saturation:1,
                        chdd:1,
                        auscultationBreathing:1,
                        presenceWeezing:1,
                        corTones:1,
                        noise:1,
                        noiseHas:1,
                        noiseComment:1,
                        presenceEdema:1,
                        psv:1
                    },
                ]"
            ],
            "tab6" => [
                "description" => "tab 6",
                "example" => "[
                    {
                        height:1,
                        bodyMass:1,
                        waistCircumference:1,
                        hipCircumference:1,
                        waistHipRatio:1,
                        imt:1,
                        presenceDegreeImt:1,
                        adiposeTissue:1,
                        internalFat:1,
                        muscleMass:1,
                        bodyType:1,
                        bone:1,
                        exchangeRate:1,
                        metabolicAge:1
                        waterInBody:1
                    },
                ]"
            ],
            "tab7" => [
                "description" => "tab 7",
                "example" => "[
                    {
                        hb:1,
                        redBloodCells:1,
                        leukocytes:1,
                        platelets:1,
                        speedBlood:1,
                        glucose:1,
                        cReactive:1,
                        urea:1,
                        creatinine:1,
                        rapidGlomFilt:1,
                        alt:1,
                        ast:1,
                        levelUricAcidSer:1,
                        totalCholesterol:1
                        triglycerides:1
                        lowDensityLipoprotein:1
                        highDensityLipoprotein:1
                        cHighDensityLipoprotein:1
                        coeffAtherogenicity:1
                        prothrombinTime:1
                        pti:1
                        interNormRel:1
                        fibrinogen:1
                        homocysteine:1
                    },
                ]"
            ],
            "tab8" => [
                "description" => "tab 8",
                "example" => "[
                    {
                        :1,
                        :1,
                        :1,
                        :1,
                        :1,
                        :1,
                        :1,
                        :1,
                        :1,
                    },
                ]"
            ],
            "tab8.*.tshx" => [
                "description" => "ТШХ",
                "example" => "text"
            ],
            "tab8.*.borgscale" => [
                "description" => "Шкала Борга",
                "example" => "text"
            ],
            "tab8.*.rufierDixontest" => [
                "description" => "Проба Руфье-Диксона I=(P1+P2+P3)-200/10",
                "example" => "text"
            ],
            "tab8.*.rufierDixontest_p1" => [
                "description" => "P1",
                "example" => ""
            ],
            "tab8.*.rufierDixontest_p2" => [
                "description" => "P2",
                "example" => ""
            ],
            "tab8.*.rufierDixontest_p3" => [
                "description" => "P3",
                "example" => ""
            ],
            "tab8.*.bem_sample" => [
                "description" => "Для тренированных больных – ВЭМ проба",
                "example" => ""
            ],
            "tab8.*.levelPhysicalFitness" => [
                "description" => "Ступень физической подготовленности (от 1 мин до 5 максимальная) расчетная'",
                "example" => ""
            ],
            "tab8.*.natureWork" => [
                "description" => "",
                "example" => ""
            ],
            "tab8.*.massTest" => [
                "description" => "",
                "example" => ""
            ],
            "tab8.*.physicalExercise" => [
                "description" => "",
                "example" => ""
            ],
            "tab8.*.pulseRate" => [
                "description" => "",
                "example" => ""
            ],
            "tab8.*.complaints" => [
                "description" => "",
                "example" => ""
            ],
            "tab9" => [
                "description" => "tab 9",
                "example" => "[
                    {
                        ri:1,
                        si:1,
                        va:1,
                        pvA:1,
                        pvB:1,
                        pvC:1,
                        ecgRhythm:1,
                        ecgRhythmNonSin:1,
                        heartRate:1,
                        conclusion:1,
                    },
                ]"
            ],
            "tab10" => [
                "description" => "tab 10",
                "example" => "[
                    {
                        stress1:1,
                        stress2:1,
                        stress3:1,
                        stress4:1,
                        stress5:1,
                        stress6:1,
                        stress7:1,
                        stressLevel:1,
                        mobility:1,
                        personalCare:1,
                        dailyActivities:1,
                        painDiscomfort:1,
                        anxietyDepression:1,
                        totalGrade:1,
                        eqvas:1,
                    },
                ]"
            ],
            "tab11" => [
                "description" => "tab 11",
                "example" => "[]"
            ],
            "tab11.*.app" => [
                "description" => "Индекс адаптационного потенциала ССС Р.М.",
                "example" => ""
            ],
            "tab11.*.score2OPResult" => [
                "description" => "SCORE-2 у больных старше 40 лет",
                "example" => ""
            ],
            "tab11.*.riskCardioDisease" => [
                "description" => "Шкала определения относительного риска, используемая для молодых людей ",
                "example" => ""
            ],
            "tab11.*.riskGroup" => [
                "description" => "Группа риска|1,2,3,4",
                "example" => "2"
            ],
            "tab11.*.obesity" => [
                "description" => "4.1.ожирение",
                "example" => "1"
            ],
            "tab11.*.diabetes" => [
                "description" => "4.2.сахарный диабет",
                "example" => "1"
            ],
            "tab11.*.physicalActivity" => [
                "description" => "4.3.недостаточная физическая активность",
                "example" => "1"
            ],
            "tab11.*.smoking" => [
                "description" => "4.4.курение",
                "example" => "0"
            ],
            "tab11.*.psychologicalStress" => [
                "description" => "4.5.психологический стресс",
                "example" => "0"
            ],
            "tab11.*.ccz" => [
                "description" => "4.6.семейный анамнез ранней заболеваемости ССЗ",
                "example" => "1"
            ],"tab11.*.hypertension" => [
                "description" => "4.7.Артериальная гипертензия пункт",
                "example" => "1"
            ],
            "tab11.*.fibrillation" => [
                "description" => "4.8.фибрилляция предсердий Пункты",
                "example" => "0"
            ],
            "tab11.*.hypertrophy" => [
                "description" => "4.9.гипертрофия миокарда левого желудочка",
                "example" => "1"
            ],
            "tab11.*.disease" => [
                "description" => "4.10.хроническая болезнь почек",
                "example" => "1"
            ],
            "tab11.*.chss" => [
                "description" => "4.11.ЧСС боле 80 в мин Пункт",
                "example" => "1"
            ],
            "tab11.*.hyperlipidemia" => [
                "description" => "4.12.Гиперлипидемия и дислипидемия",
                "example" => "1"
            ],
            "tab11.*.hyperuricemia" => [
                "description" => "4.13.Гиперурекемия",
                "example" => "1"
            ],
            "tab11.*.factors" => [
                "description" => "5.Факторы риска",
                "example" => "1"
            ],
        ];
    }
}
