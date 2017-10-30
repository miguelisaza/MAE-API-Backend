<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\Models\User;

class ApiAuthController extends Controller
{

    public function __construct()
    {
        $this->user = new User;
    }
    
    public function authenticate(Request $request){
    	/*
    	$user=user::findOrFail(1);
    	$user->password=\Hash::make("ederba");
    	$user->save();
    	dd($user);
        */
        $credentials = $request->only('code', 'password');
        //dd($credentials);
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'response' => 'error',
                    'message' => 'invalid_email_or_password',
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'response' => 'error',
                'message' => 'failed_to_create_token',
            ]);
        }
        return response()->json([

            'response' => 'success',
            'result' => [
                'token' => $token,
                "user"=>\Auth::user(),
            ],
        ]);
    }

    public function getAuthUser(Request $request){
        $user = JWTAuth::toUser($request->token);        
        return response()->json(['result' => $user]);
    }

}