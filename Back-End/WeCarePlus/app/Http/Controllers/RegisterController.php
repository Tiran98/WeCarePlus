<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Input\Input;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Contracts\Providers\Auth as ProvidersAuth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\PayloadFactory;
use Tymon\JWTAuth\JWTManager as JWT;

class RegisterController extends Controller
{
    public function Register(Request $request){
    
        $patient = new Patient();

        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        $patient->password = $request->input('password');
        $patient->gender = $request->input('gender');
        $patient->age = $request->input('age');
        $patient->address = $request->input('address');
        $patient->save();

        // Auth::Login($patient);
      
        $token = JWTAuth::fromUser($patient);

        // return response()-> json(['message'=> $patient],200);

        return response()-> json(compact('patient','token'),200);
    
    }

    public function Login(Request $request){

        $details = $request->json()->all();

        try{

        if(! $token = JWTAuth::attempt($details))
        {
            return response()->json(['error' => 'details_not_valid'],400);
        }
    }catch(JWTException $e)
    {
        return response()->json(['error' => 'details_not_jwt'],500);
    }
        
            return response()->json( compact('token') );
        }

        // $this->validate($request, [
        //     'email' => 'bail|required|email',
        //     'password' => 'bail|required|min:6',
        // ]);

        // $user = array('email' => Input::$request('email'),'password' => Input::$request('password'));
        // echo $user;

        // if(Auth::attempt($user))
        // {
        //     return response() ->json(Auth::user(),200);
        // }
        // else{
        //     return response() ->json(['error'=> 'Could not log you in.'], 401);
        // }

        public function getAuthenticatedUser()
        {
            try{
            if(! $patient = JWTAuth::parseToken()->authenticate())
            {
                return response()->json(['patient_not_found'],400);
            }
        }catch(Tymon\JWTAuth\Exceptions\TokenExpiredException $e)
        {
            return response()->json(['token_expired'],$e-> getStatusCode());
        }

            return response()->json( compact('patient') );           
        }


    }

