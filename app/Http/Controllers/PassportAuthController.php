<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordChangeRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse ;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class PassportAuthController extends Controller
{
    //
    public function register(Request $request){
        $this->validate($request,[
            'name'=>'required', 
            'email'=>'required|email',
            'password'=>'required|min:8',
        ]);
        $user=User::create([
            'name'=>$request->name, 
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        //عباره عن هاش طويل مشفر يكون فيه معلومات المستخدم $token
        $token=$user->createToken('ahmed')->accessToken;
        return response()->json(['token'=>$token],200);
    }

    public function login(Request $request){
        $data=[            
        'email'=>$request->email,
        'password'=>$request->password,];

        if(auth()->attempt($data)){
        $token= auth()->user->createToken('ahmed')->accessToken;        //عباره عن هاش طويل مشفر يكون فيه معلومات المستخدم $token
        return response()->json(['token'=>$token],200);
    }
    else{
        return response()->json(['error'=>'Unauthorised'],401);

    }
    }

    public function userinfo(){
        $user= auth()->user();          
        return response()->json(['token'=>$user],200);

    }

    public function logout(Request $request): JsonResponse
    {
        $user = auth()->user->createtoken();
        $user->revoke();

        return $this->successResponse([
            'message' => 'Logged out succesfully!',
        ]);
    }

    public function changePassword(PasswordChangeRequest $request): JsonResponse
    {
        $user = auth()->user();
        if ($user && Hash::check($request->old_password, $user->password)) {
            User::find($user->id)
                ->update([
                    'password' => Hash::make($request->password),
                ]);

            return $this->successResponse([
                'message' => 'Password has been changed',
            ]);
        }

        return $this->failedResponse();
    }
}
