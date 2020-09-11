<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Facade\FlareClient\Http\Response;
use Illuminate\Auth\Access\Response as AccessResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\Environment\Console;
use Symfony\Component\Console\Input\Input;

class EmployeeController extends Controller
{
    public function addEmp(Request $request){
    
        $employee = new Employee();

        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->password = $request->input('password');
        $employee->gender = $request->input('gender');
        $employee->phone = $request->input('phone');
        $employee->age = $request->input('age');
        $employee->address = $request->input('address');
        $employee->save();

        Auth::Login($employee);
        
        return response()-> json(['message'=> $employee],200);

    
    }
    public function index()
    {
        echo  "Controller Done";
        return response(Employee::all()->jsonSerialize());
    }

    // public function create()
    // {
    //     //
    // }
    // public function store(Request $request)
    // {
    //     //
    // }

    // public function show($id)
    // {
    //     //
    // }

    // public function edit($id)
    // {
    //     //
    // }

    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // public function destroy($id)
    // {
    //     //
    // }
}
