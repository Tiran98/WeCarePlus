<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject;
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
        
        return response()-> json(['message'=> $patient],200);

    
    }

}
