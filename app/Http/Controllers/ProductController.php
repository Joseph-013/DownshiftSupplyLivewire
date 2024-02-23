<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('livewire.main.admin.inventory', ['products' => $products]);
    }

    public function indexUser()
    {
        $products = Product::all();
        return view('livewire.main.user.products', ['products' => $products]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('livewire.main.admin.inventory', ['products' => $products]);
    }

    public function searchProducts(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('livewire.main.user.products', ['products' => $products]);
    }

    public function getProductDetails($productId)
    {
        $product = Product::find($productId);

        if ($product) {
            return response()->json([
                'success' => true,
                'product' => $product
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }
    }
}
