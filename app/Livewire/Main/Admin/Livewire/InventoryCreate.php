<?php

namespace App\Livewire\Main\Admin\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Attributes\On;

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
    public $confirmDelete;

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
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10240'],
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
                'description' => $this->description,
                'status' => 'Existing'
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
            'stockquantity' => ['required', 'numeric', 'integer', 'min:0'],
            'criticallevel' => ['required', 'numeric', 'integer', 'min:0'],
            'description' => ['required', 'string']
        ];
        $customMessages = [
            'name.required' => 'The name field is required.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.',
            'stockquantity.required' => 'The stock quantity field is required.',
            'stockquantity.numeric' => 'The stock quantity must be a number.',
            'stockquantity.integer' => 'The stock quantity must be an integer.',
            'stockquantity.min' => 'The stock quantity must be at least 0.',
            'criticallevel.required' => 'The critical level field is required.',
            'criticallevel.numeric' => 'The critical level must be a number.',
            'criticallevel.integer' => 'The critical level must be an integer.',
            'criticallevel.min' => 'The critical level must be at least 0.',
            'description.required' => 'The description field is required.',
            'image.image' => 'The image must be an image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'image.max' => 'The image may not be greater than 10 MB in size.',
        ];
        if ($this->temporaryImage) {
            $rules['image'] = ['image', 'mimes:jpeg,png,jpg', 'max:10240'];
        }
        $this->validate($rules, $customMessages);

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
        $this->validate(['image' => ['image', 'mimes:jpeg,png,jpg', 'max:10240']]);
        $this->temporaryImage = $this->image;
    }

    public function cancel()
    {
        $this->dispatch('hideItemTemplate');
    }

    #[On('deleteConfirm')]
    public function deleteConfirm()
    {
        $this->confirmDelete = true;
    }

    public function deleteProduct()
    {
        $this->dispatch('deleteProduct');
        $this->dispatch('alertNotif', 'Product successfully deleted');
        $this->cancel();
    }
}
