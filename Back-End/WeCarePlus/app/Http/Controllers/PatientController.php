<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Http\Request;
use App\Patient;
use Auth;

class PatientController extends Controller
{
    // protected $auth;

    // public function __construct()
    // {
    //     $this->middleware('auth:patient');
    // }

    public function create() {
        return view('patientcreate');
    }

    public function register(Request $request){

        $patient = new Patient();

        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        $patient->password = bcrypt($request->input('password'));
        $patient->gender = $request->input('gender');
        $patient->age = $request->input('age');
        $patient->phone = $request->input('phone');
        $patient->address = $request->input('address');
        $patient->save();


        return redirect('patient')->with('success', 'Car has been successfully added');
    }

    // public function PatientIndex()
    // {
    //     return response(Patient::all()->jsonSerialize());
    // }

    public function index()
    {
        return response(Patient::all()->jsonSerialize());
    }

    public function login(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('patient')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // return response()->json( compact('patient'), 200 );
            return response()->json(['Done' => 'Success']);
        }

        return response()->json(['error' => 'invalid credentials'],401);
    }

    public function update(Request $request) {
        $patient = Patient::find($request->patient);

        $patient->name = $request->input('name');
        $patient->gender = $request->input('gender');
        $patient->age = $request->input('age');
        $patient->phone = $request->input('phone');
        $patient->address = $request->input('address');
        $patient->save();

        return response()-> json(['message' => $patient],200);
    }

    public function destroy(Request $request) {
        $patient = Patient::destroy($request->patient);

        return response()-> json(['message' => $patient],200);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        return response()->json(['Done' => 'Logged out']);
    }
}
