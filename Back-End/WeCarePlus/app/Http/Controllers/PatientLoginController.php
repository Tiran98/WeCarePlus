<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Patient;

class PatientLoginController extends Controller
{
    protected $auth;
    protected $redirectTo = '/patientDashboard';
    protected $guard = 'patient';

    public function __construct()
    {
        $this->middleware('guest:patient');
    }

    public function showLoginForm()
    {
        if (view()->exists('auth.home')) {
            return view('auth.home');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json( compact('token') );
        }

        return response()->json(['error' => 'invalid credentials'],401);

    }
}
