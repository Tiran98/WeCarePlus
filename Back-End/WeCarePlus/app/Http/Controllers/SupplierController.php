<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(Supplier::all()->jsonSerialize());
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response(Supplier::select('_id','name')->get()->jsonSerialize());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Supplier $supplier)
    {

        $supplier->name = $request->input('name');
        $supplier->product_type = $request->input('product_type');
        $supplier->address = $request->input('address');
        $supplier->email = $request->input('email');
        $supplier->phone = $request->input('phone');
        $supplier->save();
        
        return response()-> json(['message'=> $supplier],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $supplier = Supplier::find($request->supplier);

        $supplier->name = $request->name;
        $supplier->product_type = $request->product_type;
        $supplier->address = $request->address;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;

        $supplier->save();

        return response()-> json(['message'=> $supplier],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $supplier = Supplier::destroy($request->supplier);

        return response()-> json(['message'=> $supplier],200);
    }
}
