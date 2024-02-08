<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads as LivewireWithFileUploads;

class CreateProduct extends Component
{
    use LivewireWithFileUploads;

    public $name;
    public $price;
    public $stockquantity;
    public $criticallevel;
    public $image;

    protected $rules = [
        'name' => 'required|string',
        'price' => 'required|numeric',
        'stockquantity' => 'required|numeric',
        'criticallevel' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ];

    public function createProduct()
    {
        if ($this->image && $this->name && $this->price && $this->stockquantity && $this->criticallevel) {
            $imageName = time().'.'.$this->image->extension();  
       
            $this->image->storeAs('./public/assets', $imageName);
    
            $newProduct = Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'stockquantity' => $this->stockquantity,
                'criticallevel' => $this->criticallevel,
                'image' => $imageName,
            ]);
    
            $this->reset(['name', 'price', 'stockquantity', 'criticallevel', 'image']);
    
            $this->dispatch('productCreated', $newProduct->id);
        }
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
