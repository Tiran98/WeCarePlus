<?php

namespace App\Http\Controllers;

use App\StockOrder;
use Illuminate\Http\Request;

class StockOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(StockOrder::with('suppliers')->get()->jsonSerialize());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,StockOrder $stockOrder)
    {
        $stockOrder->supplier_id = $request->input('supplier_id');
        $stockOrder->item_name = $request->input('item_name');
        $stockOrder->qty = $request->input('qty');
        $stockOrder->message = $request->input('message');
        $stockOrder->save();
        
        return response()-> json(['message'=> $stockOrder],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StockOrder  $stockOrder
     * @return \Illuminate\Http\Response
     */
    public function show(StockOrder $stockOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StockOrder  $stockOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(StockOrder $stockOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StockOrder  $stockOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockOrder $stockOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StockOrder  $stockOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(StockOrder $stockOrder)
    {
        //
    }
}
