<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\BlockRequest;
use App\Http\Requests\User\DeleteRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

/**
 * @group users
 *
 * Users
 */
class UserController extends Controller
{
    protected $service;
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    /**
     * update user
     * @bodyParam user_id int required The id of the user. Example: 9
     * @bodyParam name int required The id of the user. Example: salohiddin
     */
    public function update(UpdateRequest $request)
    {
        return $this->service->update($request);
    }
    /**
     * user-list
     */
    public function userList()
    {
        return $this->service->userList();
    }
    /**
     * update user
     * @bodyParam user_id int required The id of the user. Example: 9
     * @bodyParam is_block string required. 1-block, 0-blockdan ochish. Example: 1
     */
    public function block(BlockRequest $request)
    {
        return $this->service->block($request);
    }
    /**
     * update user
     * @bodyParam user_id int required The id of the user. Example: 9
     * @bodyParam is_delete string required. 1-delete qilish Example: 1
     */
    public function delete(DeleteRequest $request)
    {
        return $this->service->delete($request);
    }
}
