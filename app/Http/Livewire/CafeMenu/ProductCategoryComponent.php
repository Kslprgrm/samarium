<?php

namespace App\Http\Livewire\CafeMenu;

use Livewire\Component;

use App\Traits\ModesTrait;

class ProductCategoryComponent extends Component
{
    use ModesTrait;

    public $modes = [
        'create' => false,
        'list' => false,
        'display' => false,
        'delete' => false,
        'search' => false,
    ];

    protected $listeners = [
        'productCategoryCreateCompleted',
        'productCategoryCreateCancelled',
    ];

    public function render()
    {
        return view('livewire.cafe-menu.product-category-component');
    }

    public function productCategoryCreateCancelled()
    {
        $this->exitMode('create');
    }

    public function productCategoryCreateCompleted()
    {
        session()->flash('message', 'Product category created.');
        $this->exitMode('create');
    }
}
