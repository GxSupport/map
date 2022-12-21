<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
/**
 * @group Auth
 */
class PassportController extends Controller
{
    /**
     * login
     * @bodyParam id int required The id of the user. Example: 1
     * @bodyParam password string required min:8  Example: 45789654
     */
    public function login(Request $request)
    {
        $validator = $request->validate([
            'id' => 'required|numeric|exists:users,id',
            'password' => 'required|string|min:8'
        ]);
        $credentials = [
            'id' => $request->id,
            'password' => $request->password
        ];
        if (Auth()->attempt($credentials, false)) {
            $client = new Client(['verify' => false]);
            try {
                $response = $client->post(config('services.passport.url'), [
                    'form_params' => [
                        'grant_type' => 'password',
                        'client_id' => config('services.passport.id'),
                        'client_secret' => config('services.passport.secret'),
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
    /**
     * Refresh token
     * @bodyParam refresh_token string required токен (refresh_token) Example: aAbBcCdDeEfF123456aAbBcCdDeEfF123456
     */
    public function refreshToken(Request $request) {
        $validator = $request->validate( [
            'refresh_token' => 'required|string'
        ]);
        $client = new Client();
        try {
            $response = $client->post(env('PASSPORT_LOGIN_ENDPOINT'), [
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $request->refresh_token,
                    'client_id' => config('services.passport.id'),
                    'client_secret' => config('services.passport.secret'),
                    'scope' => '',
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
    /**
     * Registratsiya
     * @bodyParam name string required min:2 Example: Ali
     */
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
    /**
     * logout
     */
    public function logout()
    {
        auth()->user()->tokens()->each(function ($token, $key) {
            $token->delete();
        });
        return response()->json(['message' => "user success logout"], 200);
    }
    /**
     * login list
     */
    public function userList(){
        $user = User::where('is_delete','0')->where('is_block','0')->select('id', 'name')->get();
        if($user){
            return response()->json([
                'user' => $user
            ], 200);
        }
        return response()->json([
            'message' => "user topilmadi"
        ], 404);

    }
}
