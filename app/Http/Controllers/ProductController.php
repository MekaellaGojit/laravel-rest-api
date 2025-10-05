<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Error;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        if($products->isEmpty()){
            return response()->json([
                'status' => 'error',
                'message' => 'No products found.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Products retrieved successfully.',
            'data' => $products
        ], 200);

    }

    public function show($id){
        $product = Product ::where('id',$id)->first();

        if(!$product){
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product retrieved successfully.',
            'data' => $product
        ]);

    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'cost' => "required|decimal:2",
            'price' => "required|decimal:2",
            'quantity'=> 'required|integer',
            'expiration'=> 'required|date',
            'image_url' => "nullable",
        ]);

        if($validatedData){
            $product = Product::create([
                'name' => $validatedData['name'],
                'category' => $validatedData['category'],
                'cost' => $validatedData['cost'],
                'price' => $validatedData['price'],
                'quantity' => $validatedData['quantity'],
                'expiration' => $validatedData['expiration'],
                'image_url' => $validatedData['image_url']
            ]);

            if(!$product){
                return response()->json([
                    'status' => 'error',
                    'message' => 'An error occurred when creating product'
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Product retrieved successfully.',
                'data' => $product
            ]);
        }

    }

    public function update(Request $request, $id){

    }

    public function destroy($id){

    }

    public function toggleProduct(){

    }

}
