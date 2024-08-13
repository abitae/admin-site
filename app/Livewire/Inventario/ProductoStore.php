<?php

namespace App\Livewire\Inventario;

use App\Models\ProductStore;
use Livewire\Component;

class ProductoStore extends Component
{
    public function render()
    {
        $products = ProductStore::where('isActive', true)->paginate(10);
        return view('livewire.inventario.producto-store', compact('products'));
    }
}
