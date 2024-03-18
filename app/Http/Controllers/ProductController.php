<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class ProductController extends Controller
{
    use WithPagination;

    public function index()
    {
        // $products = Product::paginate(10);
        $products = Product::all();
        return view('livewire.main.admin.inventory', ['products' => $products]);
    }

    public function indexUser()
    {
        // $products = Product::inRandomOrder()->get();
        // return view('livewire.main.user.products', ['products' => $products]);
        return view('livewire.main.user.products');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        // $products = Product::where('name', 'like', '%' . $search . '%')->paginate(10)->get();
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('livewire.main.admin.inventory', ['products' => $products]);
    }

    public function searchProducts(Request $request)
    {
        $search = $request->input('search');
        // $products = Product::where('name', 'like', '%' . $search . '%')->paginate(10)->get();
        $products = Product::where('name', 'like', '%' . $search . '%')->inRandomOrder()->get();
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
