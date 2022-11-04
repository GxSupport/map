<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
class PassportController extends Controller
{
    public function login(Request $request)
    {
        $validator = $request->validate([
            'id' => 'required|numeric|digits_between:1,20',
            'password' => 'required|string|min:8'
        ]);
        $credentials = [
            'id' => $request->id,
            'password' => $request->password
        ];
        if (Auth()->attempt($credentials, false)) {
            $client = new Client(['verify' => false]);
            try {
                $response = $client->post(env('PASSPORT_LOGIN_ENDPOINT'), [
                    'form_params' => [
                        'grant_type' => 'password',
                        'client_id' => env('PASSPORT_CLIENT_ID'),
                        'client_secret' => env('PASSPORT_CLIENT_SECRET'),
                        'username' => $request->id,
                        'password' => $request->password,
                        'scope' => '*'
                    ]
                ]);
                return json_decode($response->getBody());
            } catch (Exception $e) {
                return response()->json([
                    'message' => $e->getMessage()
                ]);
            }
        } else {
            return response()->json(['errors' => 'password or login xato'], 401);
        }
    }
    public function refreshToken(Request $request) {
        $client = new Client();
        try {
            $response = $client->post(env('PASSPORT_LOGIN_ENDPOINT'), [
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'client_id' => env('PASSPORT_CLIENT_ID'),
                    'client_secret' => env('PASSPORT_CLIENT_SECRET'),
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope'=>'*'
                ]
            ]);
            return $response->getBody();
        } catch (BadResponseException $exception) {
            if ($exception->getCode() == 400) {
                return response()->json('Invalid request. Please enter a username and a password', $exception->getCode());
            } else if ($exception->getCode() == 401) {
                return response()->json('Your credentials are incorrect. Please try again', $exception->getCode());
            }
            return response()->json('Something went wrong on the server'.$exception, $exception->getCode());
        } catch (GuzzleException $e) {
            return response()->json($e->getCode());
        }
    }

    public function register(Request $request){
        $validate = $request->validate([
            'name' => 'required|string|min:2',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt(12345678);
        try{
            $user->save();
            return response()->json([
                'message' => 'user succesfully registered',
                'user' => $user
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
    public function logout()
    {
        auth()->user()->tokens()->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json(['message' => "user success logout"], 200);
    }
    public function userList(){
        $user = User::select('id', 'name')->get();
        if($user){
            return response()->json([
                'user' => $user
            ], 200);
        }
        return response()->json([
            'messaga' => 'user topilmadi'
        ], 404);

    }
}
