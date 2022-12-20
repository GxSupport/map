<?php

namespace App\Services;


use App\Http\Resources\User\UserResource;
use App\Models\User;

class UserService
{
    public function update ($request)
    {
        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->save();
        return response()->json(['message'=>'user updated', 'data'=> new UserResource($user)]);
    }
    public function userList()
    {
        $user = User::where('is_delete','0')->paginate(10);
        return response()->json(['message'=>'success','data'=> UserResource::collection($user)->resource]);
    }
    public function block($request)
    {
        $user = User::find($request->user_id);
        $user->is_block = $request->is_block;
        $user->save();
        return response()->json(['message'=>'success','data'=> new UserResource($user)]);
    }
    public function delete($request)
    {
        $user = User::find($request->user_id);
        $user->is_delete = $request->is_delete;
        $user->save();
        return response()->json(['message'=>'success']);
    }

}
