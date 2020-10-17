<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;
use PDF;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Income::all()->jsonSerialize());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(Income::select('_id','name')->get()->jsonSerialize());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Income $income)
    {
        $income->emptype= $request->input('emptype');
        $income->date= $request->input('date');
        $income->regNum= $request->input('regNum');
        $income->name= $request->input('name');
        $income->paytype= $request->input('paytype');
        $income->payAmount= $request->input('payAmount');
        $income->save();

        return response()-> json(['message'=> $income],200);
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
        $income = Income::find($request->income);

        $income->emptype = $request->emptype;
        $income->date = $request->date;
        $income->regNum = $request->regNum;
        $income->name = $request->name;
        $income->paytype = $request->paytype;
        $income->payAmount = $request->payAmount;

        $income->save();

        return response()-> json(['message'=> $income],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $income = Income::destroy($request->income);

        return response()-> json(['message'=> $income],200);
    }
}
