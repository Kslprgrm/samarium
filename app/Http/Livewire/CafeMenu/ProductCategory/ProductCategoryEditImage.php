<?php

namespace App\Http\Livewire\CafeMenu\ProductCategory;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCategoryEditImage extends Component
{
    use WithFileUploads;

    public $productCategory;

    public $image;

    public function render()
    {
        return view('livewire.cafe-menu.product-category.product-category-edit-image');
    }

    public function update()
    {
        $validatedData = $this->validate([
            'image' => 'required|image',
        ]);

        $imagePath = $this->image->store('products', 'public');
        $validatedData['image_path'] = $imagePath;

        $this->productCategory->image_path = $validatedData['image_path'];
        $this->productCategory->save();

        $this->emit('productCategoryUpdateImageCompleted');
    }
}
