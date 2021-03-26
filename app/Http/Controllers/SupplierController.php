<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        //
        return Supplier::get();
    }

    public function show($id)
    {
        //
        return Supplier::where('id', $id)->first();
    }

    public function store(SupplierRequest $request)
    {

        $data = $request->all();
        $supplier = new Supplier();
        $supplier->fill($data);
        $supplier->save();
        return response()->json($supplier);
    }

    public function update(SupplierRequest $request, $id)
    {

        $supplier = Supplier::findOrFail($id);

        $data = $request->all();
        $supplier->update($data);
        $supplier->save();
        return response()->json($supplier);
    }


    public function destroy($id)
    {
        Supplier::where('id', $id)->delete();
        $supplier = Supplier::all();
        return response()->json($supplier);
    }
}
