<?php

namespace App\Livewire\Main\Admin\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class InventoryCreate extends Component
{
    use WithFileUploads;

    public $mode = 'read';

    public $product;
    public $id;
    public $name;
    public $price;
    public $stockquantity;
    public $criticallevel;
    public $image;
    public $description;
    public $temporaryImage;

    public function mount($product, $mode)
    {
        $this->product = Product::find($product);
        // redundant ata tong part ng code
        // if ($mode == null) {
        //     $this->mode = 'read';
        // } else {
        $this->mode = $mode;
        // }
        $this->temporaryImage = null;
        if ($this->product) {
            $this->id = $this->product->id;
            $this->name = $this->product->name;
            $this->price = $this->product->price;
            $this->stockquantity = $this->product->stockquantity;
            $this->criticallevel = $this->product->criticallevel;
            $this->image = $this->product->image;
            $this->description = $this->product->description;
        } else {
            $this->mode = 'write';
            $this->name = null;
            $this->price = null;
            $this->stockquantity = null;
            $this->criticallevel = null;
            $this->image = null;
            $this->description = null;
        }
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.inventory-create');
    }

    public function modifyProduct()
    {
        $this->mode = 'write';
    }

    public function createProduct()
    {
        $this->validate([
            'name' => ['required', 'string', 'unique:' . Product::class],
            'price' => ['required', 'numeric', 'min:0'],
            'stockquantity' => ['required', 'numeric', 'min:0'],
            'criticallevel' => ['required', 'numeric', 'min:0'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:4096'],
        ]);

        if ($this->name && $this->price && $this->stockquantity && $this->criticallevel && $this->image) {
            $imageName = time() . '.' . $this->image->extension();
            $this->image->storeAs('public/assets', $imageName);

            Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'stockquantity' => $this->stockquantity,
                'criticallevel' => $this->criticallevel,
                'image' => $imageName,
                'description' => $this->description
            ]);

            $this->dispatch('alertNotif', 'Product successfully created');
            $this->dispatch('hideItemTemplate');
        }
    }

    public function editProduct()
    {
        $currentProduct = $this->product;
        $rules = [
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stockquantity' => ['required', 'numeric', 'min:0'],
            'criticallevel' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string']
        ];
        if ($this->temporaryImage) {
            $rules['image'] = ['image', 'mimes:jpeg,png,jpg', 'max:4096'];
        }
        $this->validate($rules);

        if ($this->name && $this->price && $this->stockquantity && $this->criticallevel) {
            $currentProduct->name = $this->name;
            $currentProduct->price = $this->price;
            $currentProduct->stockquantity = $this->stockquantity;
            $currentProduct->criticallevel = $this->criticallevel;
            $currentProduct->description = $this->description;
            if ($this->temporaryImage) {
                $imageName = time() . '.' . $this->image->extension();
                $this->image->storeAs('public/assets', $imageName);
                $currentProduct->image = $imageName;
            }
            $currentProduct->save();

            $this->dispatch('alertNotif', 'Product details successfully updated');
            $this->dispatch('hideItemTemplate');
            $this->dispatch('renderProductDetails');
        }
    }

    public function updatedImage($value)
    {
        $this->validate(['image' => ['image', 'mimes:jpeg,png,jpg', 'max:4096']]);
        $this->temporaryImage = $this->image;
    }

    public function cancel()
    {
        $this->dispatch('hideItemTemplate');
    }
}
