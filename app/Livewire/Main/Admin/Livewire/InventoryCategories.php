<?php

namespace App\Livewire\Main\Admin\Livewire;

use App\Models\ProductCategories;
use Livewire\Component;
use Livewire\Attributes\On;

class InventoryCategories extends Component
{
    public $categories = [];
    public $editingCategory = null;
    public $confirmDelete;
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
        }
    }

    public function deleteCategory($category)
    {
        ProductCategories::where('category', $category)->delete();
        $this->dispatch('alertNotif', ['message' => 'Category successfully deleted', 'type' => 'positive']);
    }

    #[On('deleteConfirm')]
    public function deleteConfirm()
    {
        $this->confirmDelete = true;
    }

    public function addCategory()
    {
        if (!empty($this->newCategory)) {
            ProductCategories::create(['category' => $this->newCategory]);
            $this->newCategory = '';
        }
    }
}
