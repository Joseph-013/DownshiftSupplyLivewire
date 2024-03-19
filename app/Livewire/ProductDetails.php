<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\On;
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
    public $confirmDelete = false;
    public $confirmUpdate = false;

    // protected $listeners = ['productSelected'];

    public function mount()
    {
        $this->selectedProduct = null;
        $this->newlyUploadedImage = false;
    }

    #[On('productSelected')]
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
            $this->dispatch('renderProductList');
            $this->confirmDelete = false;
            $this->dispatch('alertNotif', 'Product successfully deleted');
        }
    }

    public function deleteConfirm()
    {
        $this->confirmDelete = true;
    }

    // public function updateProduct()
    // {
    //     if ($this->selectedProduct) {
    //         if ($this->newImage instanceof \Illuminate\Http\UploadedFile) {
    //             $imagePath = public_path('storage/assets/' . $this->selectedProduct->image);
    //             if (file_exists($imagePath)) {
    //                 unlink($imagePath);
    //             }

    //             $newImageName = time() . '.' . $this->newImage->extension();
    //             $this->newImage->storeAs('public/assets/', $newImageName);

    //             $this->selectedProduct->image = $newImageName;
    //         }
    //         $this->selectedProduct->name = $this->newName;
    //         $this->selectedProduct->price = $this->newPrice;
    //         $this->selectedProduct->stockquantity = $this->newStockquantity;
    //         $this->selectedProduct->criticallevel = $this->newCriticallevel;
    //         $this->selectedProduct->save();
    //         $this->dispatch('renderProductList');
    //         $this->confirmUpdate = false;
    //         $this->dispatch('alertNotif', 'Product successfully updated');
    //         $this->clearProductDetails();
    //     }
    // }

    // public function updateConfirm()
    // {
    //     $this->confirmUpdate = true;
    // }

    // public function updatedNewImage()
    // {
    //     $this->newlyUploadedImage = true;
    // }

    #[On('clearProductDetails')]
    public function clearProductDetails()
    {
        $this->selectedProduct = null;
        $this->render();
    }

    #[On('renderProductDetails')]
    public function render()
    {
        return view('livewire.main.admin.livewire.product-details');
    }

    public function modifyProduct()
    {
        // dd($this->selectedProduct->id);
        $this->dispatch('useItemTemplate', product: $this->selectedProduct->id);
    }
}
