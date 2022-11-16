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
            'tab1.*.general_state' => 'nullable|in:1,2,3',
            'tab1.*.complaints_shortness' => 'nullable|in:1,2,3,4',
            'tab1.*.heartbeat' => 'nullable|in:0,1',
            'tab1.*.headache' => 'nullable|in:1,2,3,4',
            'tab1.*.pain_heart' => 'nullable|in:1,2',
            'tab1.*.dizziness' => 'nullable|in:1,2',
            'tab1.*.ad' => 'nullable|in:1,2,3,4,5,6',
            'tab1.*.ad_text' => 'nullable|string',
            'tab2' => 'array|nullable',
            'tab2.*.a' => 'nullable|in:0,1',
            'tab2.*.b' => 'nullable|in:0,1',
            'tab2.*.c' => 'nullable|in:0,1',
            'tab2.*.d' => 'nullable|in:0,1',
            'tab2.*.e' => 'nullable|in:0,1',
            'tab2.*.f' => 'nullable|in:0,1',
            'tab2.*.g' => 'nullable|in:1,2,3',
            'tab2.*.h' => 'nullable|in:1,2,3,4,5,6,7',
            'tab2.*.i' => 'nullable|in:0,1',
            'tab2.*.k' => 'nullable|in:0,1',
            'tab2.*.l' => 'nullable|in:0,1',
            'tab2.*.m' => 'nullable|in:0,1',
            'tab2.*.n' => 'nullable|in:0,1',
            'tab2.*.o' => 'nullable|in:0,1',
            'tab2.*.p' => 'nullable|in:0,1',
            'tab2.*.q' => 'nullable|in:0,1',
            'tab3' => 'nullable|array',
            'tab3.*.diuretics' => 'nullable|in:0,1',
            'tab3.*.betaBlockers' => 'nullable|in:0,1',
            'tab3.*.calcium' => 'nullable|in:0,1',
            'tab3.*.apf' => 'nullable|in:0,1',
            'tab3.*.ara' => 'nullable|in:0,1',
            'tab3.*.amkr' => 'nullable|in:0,1',
            'tab3.*.antiarrhythmics' => 'nullable|in:0,1',
            'tab3.*.nitrates' => 'nullable|in:0,1',
            'tab3.*.cardiac' => 'nullable|in:0,1',
            'tab4' => 'nullable|array',
            'tab4.*.alcohol' => 'nullable|in:1,2,3',
            'tab4.*.smoking' => 'nullable|in:1,2,3',
            'tab4.*.gb' => 'nullable|in:1,2,3,4',
            'tab4.*.ibs' => 'nullable|in:1,2,3,4',
            'tab4.*.sd' => 'nullable|in:1,2,3,4',
            'tab4.*.ssz' => 'nullable|in:1,2,3,4',

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
                "description" => "tab 3",
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

        ];
    }
}
