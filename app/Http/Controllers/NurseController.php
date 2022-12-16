<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinishRequest;
use App\Http\Requests\NurseRequest;
use App\Services\ClientService;
use Illuminate\Http\Request;

/**
 * @group Nurse doc
 *
 * APIs for managing users
 */
class NurseController extends Controller
{
    protected $service;
    public function __construct(ClientService $service)
    {
        $this->service = $service;
    }
    /**
     * Clientni id orqali olish
     * @urlParam id integer required The ID of the client.
     */
    public function getNurseDoc($id){
        return $this->service->getNurseDoc($id);
    }
    /**
     * Clientni list vs search
     * @urlParam search string optional. clientni istalgan parametrlari orqali izlab topadi.
     */
    public function getAllNurse(Request $request){
       return $this->service->getAllNurse($request);
    }
    /**
     * Client create or Update
     */
    public function tabCreateOrUpdate(NurseRequest $request){
        return $this->service->tabCreateOrUpdate($request);
    }
    /**
     * documentni yopish
     */
    public function finish(FinishRequest $request)
    {
        return $this->service->finish($request);
    }
}
