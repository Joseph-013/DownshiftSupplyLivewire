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
    public $confirmDelete;

    public function mount($productId)
    {
        if ($productId != 0)
            $this->selectedProduct = $productId;
        else
            $this->selectedProduct = null;
        $this->confirmDelete = false;
    }

    #[On('productSelected')]
    public function productSelected($productId)
    {
        $this->selectedProduct = Product::find($productId);
    }

    public function deleteConfirm()
    {
        $this->confirmDelete = true;
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
            $this->confirmDelete = false;
            $this->dispatch('renderProductList');
            $this->dispatch('alertNotif', 'Product successfully deleted');
        }
    }

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
