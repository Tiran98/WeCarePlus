<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return Patient::all();
    }

    public function store(Request $request){
        $Patient = Patient::create($request->all());

        return $request->all();
    }
}
