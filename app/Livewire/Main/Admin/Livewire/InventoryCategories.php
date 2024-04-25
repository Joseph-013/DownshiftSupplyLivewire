<?php

namespace App\Livewire\Main\Admin\Livewire;

use App\Models\Product;
use App\Models\ProductCategories;
use Livewire\Component;
use Livewire\Attributes\On;

class InventoryCategories extends Component
{
    public $categories = [];
    public $editingCategory = null;
    public $confirmDeleteCategory;
    public $newCategory;

    public function fetchCategories()
    {
        $this->categories = ProductCategories::pluck('category')->toArray();
    }

    public function hideCategoriesWindow()
    {
        $this->dispatch('setCategoriesWindow', visibility: false);
    }

    public function render()
    {
        $this->fetchCategories();
        return view('livewire.main.admin.livewire.inventory-categories');
    }

    public function editCategory($category)
    {
        $this->editingCategory = $category;
    }

    public function updateCategory($index)
    {
        if ($this->editingCategory !== null) {
            ProductCategories::where('category', $this->categories[$index])
                             ->update(['category' => $this->editingCategory]);
            $this->editingCategory = null;
            $this->dispatch('alertNotif', ['message' => 'Category successfully updated', 'type' => 'positive']);
            $this->dispatch('renderProductList');
        }
    }

    public function deleteCategory($category)
    {
        $categoryId = ProductCategories::where('category', $category)->value('id');

        Product::where('category_id', $categoryId)->update(['category_id' => null]);

        ProductCategories::where('category', $category)->delete();

        $this->confirmDeleteCategory = false;
        $this->dispatch('alertNotif', ['message' => 'Category successfully deleted', 'type' => 'positive']);
        $this->dispatch('renderProductList');
    }


    public function deleteConfirmCategories()
    {
        $this->confirmDeleteCategory = true;
    }

    public function addCategory()
    {
        if (!empty($this->newCategory)) {
            ProductCategories::create(['category' => $this->newCategory]);
            $this->newCategory = '';
        }
    }
}
