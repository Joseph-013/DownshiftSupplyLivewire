<?php

namespace App\Livewire;

use GuzzleHttp\Client;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $price;
    public $stockquantity;
    public $criticallevel;
    public $image;
    public $test;


    protected $rules = [
        'name' => 'required|string|unique:product',
        'price' => 'required|numeric',
        'stockquantity' => 'required|numeric',
        'criticallevel' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:4096',
    ];


    // $imagePath = Storage::url('assets/' . $imageName);

    public function createProduct()
    {

        $this->validate([
            'name' => ['required', 'string', 'unique:' . Product::class],
            'price' => ['required', 'numeric'],
            'stockquantity' => ['required', 'numeric'],
            'criticallevel' => ['required', 'numeric'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
        ]);

        if ($this->image && $this->name && $this->price && $this->stockquantity && $this->criticallevel) {
            $imageName = time() . '.' . $this->image->extension();
            $this->image->storeAs('public/assets', $imageName);

            Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'stockquantity' => $this->stockquantity,
                'criticallevel' => $this->criticallevel,
                'image' => $imageName,
            ]);

            $this->name = null;
            $this->price = null;
            $this->stockquantity = null;
            $this->criticallevel = null;
            $this->image = null;
            $this->reset(['name', 'price', 'stockquantity', 'criticallevel', 'image']);
            $this->dispatch('newProduct');
            $this->dispatch('clearProductDetails');
            $this->dispatch('alertNotif', 'Product successfully created');
        }
    }

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:10240',
        ]);
    }
    public function mount($productId)
    {
        $this->test = $productId;
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.create-product');
    }
}
