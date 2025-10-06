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
                'message' => 'Product created successfully.',
                'data' => $product
            ]);
        }

    }

    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'cost' => "required|decimal:2",
            'price' => "required|decimal:2",
            'quantity'=> 'required|integer',
            'expiration'=> 'required|date',
            'image_url' => "nullable",
        ]);

        $product = Product::where('id',$id)->first();
        if(!$product){
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ]);
        }

        $updatedProduct = $product->update([
            'name' => $validatedData['name'],
            'category' => $validatedData['category'],
            'cost' => $validatedData['cost'],
            'price' => $validatedData['price'],
            'quantity' => $validatedData['quantity'],
            'expiration' => $validatedData['expiration'],
            'image_url' => $validatedData['image_url']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully.',
            'data' => $product
        ]);
    }

    public function destroy($id){
        $product = Product::where('id',$id)->first();
        if(!$product){
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ]);
        }

            $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Product deleted successfully.'
            ]);

    }

    public function searchByName(Request $request)
    {
        $search = trim($request->query('q'));

        if (!$search) {
            return response()->json([
                'status' => 'error',
                'message' => 'Provide a keyword.'
            ], 400);
        }

        $products = Product::where('name', 'LIKE', "%{$search}%")
            ->orWhere('category', 'LIKE', "%{$search}%")
            ->get(['id', 'name','category', 'price', 'quantity']);

        if ($products->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'Product not found.',
                'data' => []
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product found.',
            'data' => $products
        ], 200);
    }

}
