<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(){
        $sales = Sale::with('product')->get();
        return response()->json($sales);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer:1',
            'amount' => 'required|numeric:0'
        ]);

        $sale = Sale::create($validatedData);

        $product = Product::find($validatedData['product_id']);
        $product->quantity -= $validatedData['quantity'];
        $product -> save();

        return response()->json([
            'message' => 'Sale successfully recorded!',
            'sale' => $sale
        ], 201);
    }

    public function show($id){
        $sale = Sale::with('product')->findOrFail($id);
        return response()->json($sale);
    }

    public function destroy($id){
        $sale = Sale:: findOrFail($id);
        $sale->delete();

        return response()->json([
            'message' => 'Sale successfully deleted!'
        ], 201);
    }

}
