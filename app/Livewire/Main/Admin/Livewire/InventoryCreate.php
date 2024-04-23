<?php

namespace App\Livewire\Main\Admin\Livewire;

use App\Models\Product;
use App\Models\ProductImages;
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
    public $temporaryImages;
    public $confirmDelete;
    public $images;
    public $overwrite;
    public $productImages;

    public function mount($product, $mode)
    {
        $this->product = Product::find($product);
        $this->mode = $mode;
        $this->temporaryImages = [];
        if ($this->product) {
            $this->id = $this->product->id;
            $this->name = $this->product->name;
            $this->price = $this->product->price;
            $this->stockquantity = $this->product->stockquantity;
            $this->criticallevel = $this->product->criticallevel;
            $this->description = $this->product->description;
            $this->overwrite = false;
            $this->productImages = ProductImages::where('product_id', $this->product->id)->get();
        } else {
            $this->mode = 'write';
            $this->name = null;
            $this->price = null;
            $this->stockquantity = null;
            $this->criticallevel = null;
            $this->images = [null];
            $this->description = null;
            $this->overwrite = true;
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
            'images.*' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10240'],
        ], [
            'images.*.required' => 'The image field is required',
            'images.*.image' => 'The image must be an image file.',
            'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'images.*.max' => 'The image may not be greater than 10 MB in size.',  
        ]);

        if ($this->name && $this->price && $this->stockquantity && $this->criticallevel && $this->images) {
            $product = Product::create([
                'name' => $this->name,
                'price' => $this->price,
                'stockquantity' => $this->stockquantity,
                'criticallevel' => $this->criticallevel,
                'description' => $this->description,
                'status' => 'Existing'
            ]);

            foreach ($this->images as $image) {
                $imageName = time() . '.' . $image->extension();
                $image->storeAs('public/assets', $imageName);
    
                ProductImages::create([
                    'product_id' => $product->id,
                    'image' => $imageName,
                ]);
            }

            $this->dispatch('alertNotif', ['message' => 'Product successfully created', 'type' => 'positive']);
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
            'images.*.required' => 'The image field is required',
            'images.*.image' => 'The image must be an image file.',
            'images.*.mimes' => 'The image must be a file of type: jpeg, png, jpg.',
            'images.*.max' => 'The image may not be greater than 10 MB in size.',
        ];
        if ($this->images > 0) {
            $rules['images.*'] = ['required', 'image', 'mimes:jpeg,png,jpg', 'max:10240'];
        }
        $this->validate($rules, $customMessages);

        if ($this->name && $this->price && $this->stockquantity && $this->criticallevel) {
            $currentProduct->name = $this->name;
            $currentProduct->price = $this->price;
            $currentProduct->stockquantity = $this->stockquantity;
            $currentProduct->criticallevel = $this->criticallevel;
            $currentProduct->description = $this->description;
            if ($this->overwrite) {
                foreach ($this->productImages as $image) {
                    $imagePath = public_path('storage/assets/' . $image->image);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    $image->delete();
                }

                foreach ($this->images as $image) {
                    $imageName = uniqid() . '.' . $image->extension();
                    $image->storeAs('public/assets', $imageName);
        
                    ProductImages::create([
                        'product_id' => $currentProduct->id,
                        'image' => $imageName,
                    ]);
                }
            }
            $currentProduct->save();

            $this->dispatch('alertNotif', ['message' => 'Product details successfully updated', 'type' => 'positive']);
            $this->dispatch('hideItemTemplate');
            $this->dispatch('renderProductDetails');
        }
    }

    public function updatedImages()
    {
        $this->temporaryImages = [];

        foreach ($this->images as $image) {
            $this->temporaryImages[] = $image->temporaryUrl();
        }
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
        $this->cancel();
    }

    public function addImages()
    {
        if (count($this->images) < 4) {
            $this->images[] = null;
        }
    }

    public function removeImage($index)
    {
        unset($this->temporaryImages[$index]);
        unset($this->images[$index]);
        $this->updatedImages();
    }

    public function setOverwrite()
    {
        $this->overwrite = true;
        $this->images = [null];
    }
}
