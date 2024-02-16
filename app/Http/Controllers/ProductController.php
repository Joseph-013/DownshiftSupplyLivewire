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

    public function search(Request $request)
    {
        $search = $request->input('search');
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
        return view('livewire.main.admin.inventory', ['products' => $products]);
    }
}
