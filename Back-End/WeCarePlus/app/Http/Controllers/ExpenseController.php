<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Expense::all()->jsonSerialize());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(Expense::select('_id','name')->get()->jsonSerialize());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Expense $expense)
    {
        $expense->emptype= $request->input('emptype');
        $expense->date= $request->input('date');
        $expense->regNum= $request->input('regNum');
        $expense->name= $request->input('name');
        $expense->paytype= $request->input('paytype');
        $expense->payAmount= $request->input('payAmount');
        $expense->save();

        return response()-> json(['message'=> $expense],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $expense = Expense::find($request->expense);

        $expense->emptype = $request->emptype;
        $expense->date = $request->date;
        $expense->regNum = $request->regNum;
        $expense->name = $request->name;
        $expense->paytype = $request->paytype;
        $expense->payAmount = $request->payAmount;

        $expense->save();

        return response()-> json(['message'=> $expense],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $expense = Expense::destroy($request->expense);

        return response()-> json(['message'=> $expense],200); 
    }
}
