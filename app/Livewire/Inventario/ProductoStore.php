<?php

namespace App\Livewire\Inventario;

use App\Models\ProductStore;
use App\Livewire\Forms\ProductStoreForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductoStore extends Component
{
    public $search = '';
    public ProductStoreForm $productForm;
    public $isOpenModal = false;
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    public function render()
    {
        $products = ProductStore::where('code_entrada', 'LIKE', '%' . $this->search . '%')
            ->paginate(10);
        return view('livewire.inventario.producto-store', compact('products'));
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    public function create()
    {
        $this->productForm->reset();
        $this->isOpenModal = true;
    }
    public function update(ProductStore $product)
    {
        $this->productForm->reset();
        $this->productForm->setProductStore($product);
        $this->isOpenModal = true;
    }
    public function estado(ProductStore $product)
    {
        if ($this->productForm->estado($product->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createProduct()
    {
        if ($this->productForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function delete(ProductStore  $product)
    {
        
        if ($this->productForm->destroy($product->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    private function message($tipo, $tittle, $message)
    {
        $this->alert($tipo, $tittle, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => false,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
