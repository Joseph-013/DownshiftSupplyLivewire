<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProductDetails extends Component
{
    use WithFileUploads;

    public $selectedProduct;
    public $newName;
    public $newPrice;
    public $newStockquantity;
    public $newCriticallevel;
    public $newImage;
    public $newlyUploadedImage;

    protected $listeners = ['productSelected'];

    public function mount()
    {
        $this->selectedProduct = null;
        $this->newlyUploadedImage = false;
    }

    public function productSelected($productId)
    {
        $this->selectedProduct = Product::find($productId);
        $this->newName = $this->selectedProduct->name;
        $this->newPrice = $this->selectedProduct->price;
        $this->newStockquantity = $this->selectedProduct->stockquantity;
        $this->newCriticallevel = $this->selectedProduct->criticallevel;
        $this->newImage = $this->selectedProduct->image;
        $this->newlyUploadedImage = false;
    }

    public function deleteProduct()
    {
        if ($this->selectedProduct) {
            $imagePath = public_path('storage/assets/' . $this->selectedProduct->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $this->selectedProduct->delete();
            $this->selectedProduct = null;
            $this->dispatch('productDeleted');
        }
    }

    public function updateProduct()
    {
        if ($this->selectedProduct) {
            if ($this->newImage instanceof \Illuminate\Http\UploadedFile) {
                $imagePath = public_path('storage/assets/' . $this->selectedProduct->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $newImageName = time() . '.' . $this->newImage->extension();
                $this->newImage->storeAs('public/assets/', $newImageName);

                $this->selectedProduct->image = $newImageName;
            }
            $this->selectedProduct->name = $this->newName;
            $this->selectedProduct->price = $this->newPrice;
            $this->selectedProduct->stockquantity = $this->newStockquantity;
            $this->selectedProduct->criticallevel = $this->newCriticallevel;
            $this->selectedProduct->save();
            $this->dispatch('productCreated');
        }
    }

    public function updatedNewImage()
    {
        $this->newlyUploadedImage = true;
    }

    public function render()
    {
        return view('livewire.main.admin.livewire.product-details');
    }
}
