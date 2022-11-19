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
        return [
            'active_tab' => 'required|in:0,1,2,3,4,5,6,7,8,9,10,11',
            'main' => 'array|nullable',
            'main.*.id' => 'nullable|exists:nurse_docs,id',
            'main.*.name' => 'required|string|min:2',
            'main.*.surname' => 'required|string|min:2',
            'main.*.middlename' => 'nullable|string|min:2',
            'main.*.inclusion' => 'required|dateformat:Y-m-d H:i:s',
            'main.*.repeat' => 'required|boolean',
            'main.*.ambul_number' => 'required|string',
            'main.*.phone' => 'required|string',
            'main.*.age' => 'required|integer',
            'main.*.address' => 'required|string|min:2',
            'main.*.birthDate' => 'required|dateformat:Y-m-d H:i:s',
            'main.*.gender' => 'required|in:0,1',
            'tab1' => 'array|nullable',
            'tab1.*.general_state' => 'nullable|integer|in:1,2,3',
            'tab1.*.complaints_shortness' => 'nullable|integer|in:1,2,3,4',
            'tab1.*.heartbeat' => 'nullable|integer|in:0,1',
            'tab1.*.headache' => 'nullable|integer|in:1,2,3,4',
            'tab1.*.pain_heart' => 'nullable|integer|in:1,2',
            'tab1.*.dizziness' => 'nullable|integer|in:1,2',
            'tab1.*.ad' => 'nullable|integer|in:1,2,3,4,5,6',
            'tab1.*.ad_text' => 'nullable|string',
            'tab2' => 'array|nullable',
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
            'tab3' => 'nullable|array',
            'tab3.*.diuretics' => 'nullable|integer|in:0,1',
            'tab3.*.betaBlockers' => 'nullable|integer|in:0,1',
            'tab3.*.calcium' => 'nullable|integer|in:0,1',
            'tab3.*.apf' => 'nullable|integer|in:0,1',
            'tab3.*.ara' => 'nullable|integer|in:0,1',
            'tab3.*.amkr' => 'nullable|integer|in:0,1',
            'tab3.*.antiarrhythmics' => 'nullable|integer|in:0,1',
            'tab3.*.nitrates' => 'nullable|integer|in:0,1',
            'tab3.*.cardiac' => 'nullable|integer|in:0,1',
            'tab4' => 'nullable|array',
            'tab4.*.alcohol' => 'nullable|integer|in:1,2,3',
            'tab4.*.smoking' => 'nullable|integer|in:1,2,3',
            'tab4.*.gb' => 'nullable|integer|in:1,2,3,4',
            'tab4.*.ibs' => 'nullable|integer|in:1,2,3,4',
            'tab4.*.sd' => 'nullable|integer|in:1,2,3,4',
            'tab4.*.ssz' => 'nullable|integer|in:1,2,3,4',
            'tab5' => 'nullable|array',
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
            'tab6' => 'nullable|array',
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
            'tab7' => 'nullable|array',
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
            'tab8' => 'nullable|array',
            'tab8.*.tshx' => 'nullable|string',
            'tab8.*.borgscale' => 'nullable|string',
            'tab8.*.rufierDixontest' => 'nullable|string',
            'tab8.*.rufierDixontest_p1' => 'nullable|string',
            'tab8.*.rufierDixontest_p2' => 'nullable|string',
            'tab8.*.rufierDixontest_p3' => 'nullable|string',
            'tab8.*.bem_sample' => 'nullable|string',
            'tab8.*.levelPhysicalFitness' => 'nullable|string',
            'tab8.*.physical_definition' => 'nullable|string',
            'tab9' => 'nullable|array',
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
            'tab10' => 'nullable|array',
            'tab10.*.stress1' => 'nullable|integer|in1,2,3,4',
            'tab10.*.stress2' => 'nullable|integer|in1,2,3,4',
            'tab10.*.stress3' => 'nullable|integer|in1,2,3,4',
            'tab10.*.stress4' => 'nullable|integer|in1,2,3,4',
            'tab10.*.stress5' => 'nullable|integer|in1,2,3,4',
            'tab10.*.stress6' => 'nullable|integer|in1,2,3,4',
            'tab10.*.stress7' => 'nullable|integer|in1,2,3,4',
            'tab10.*.stressLevel' => 'nullable|string',
            'tab10.*.mobility' => 'nullable|integer|in:1,2,3',
            'tab10.*.personalCare' => 'nullable|integer|in:1,2,3',
            'tab10.*.dailyActivities' => 'nullable|integer|in:1,2,3',
            'tab10.*.painDiscomfort' => 'nullable|integer|in:1,2,3',
            'tab10.*.anxietyDepression' => 'nullable|integer|in:1,2,3',
            'tab10.*.totalGrade' => 'nullable|string',
            'tab10.*.eqvas' => 'nullable|string',
        ];
    }

    public function bodyParameters(){
        return [
            "active_tab" => [
                "description" => "update bolayotgan tabni id si",
                "example" => "1"
            ],

            "main" => [
                "description" => "umumiy malumotlar",
                "example" => "[
                    {
                        id:2,
                        name:Yoqubjon,
                        surname:mehmed,
                        middlename: ji,
                        address:toshkent,
                        age:24,
                        inclusion:2021-02-13 12:12:12,
                        repeat:0,
                        ambul_number:1,
                        phone:12565989,
                        address:5464,
                        birthDate:1998-05-26 12:12:12,
                        gender:1
                    },
                ]"
            ],

            "tab1" => [
                "description" => "tab 1",
                "example" => "[
                    {
                        general_state:,
                        complaints_shortness:1,
                        heartbeat:1,
                        headache:1,
                        pain_heart:1,
                        dizziness:1,
                        ad:1,
                        ad_text:ytgydy
                    },
                ]"
            ],
            "tab2" => [
                "description" => "tab 2",
                "example" => "[
                    {
                        a:1,
                        b:1,
                        c:1,
                        d:1,
                        e:1,
                        f:1,
                        g:1,
                        h:1,
                        i:1,
                        k:1,
                        l:1,
                        m:1,
                        n:1,
                        o:1,
                        p:1,
                        q:1
                    },
                ]"
            ],
            "tab3" => [
                "description" => "tab 3",
                "example" => "[
                    {
                        diuretics:1,
                        betaBlockers:1,
                        calcium:0,
                        apf:1,
                        ara:1,
                        amkr:0,
                        antiarrhythmics:1,
                        nitrates:0,
                        cardiac:1
                    },
                ]"
            ],
            "tab4" => [
                "description" => "tab 4",
                "example" => "[
                    {
                        alcohol:1,
                        smoking:2,
                        gb:1,
                        ibs:2,
                        sd:1,
                        ssz:1
                    },
                ]"
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
                        tshx:1,
                        borgscale:1,
                        rufierDixontest:1,
                        rufierDixontest_p1:1,
                        rufierDixontest_p2:1,
                        rufierDixontest_p3:1,
                        bem_sample:1,
                        levelPhysicalFitness:1,
                        physical_definition:1,
                    },
                ]"
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

        ];
    }
}
