<?php

namespace App\Livewire\Almacen;

use App\Exports\ProductsExport;
use App\Livewire\Forms\ProductForm;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Line;
use App\Models\Product;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class ProductLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    use WithFileUploads;
    public ProductForm $productForm;
    public $search = '';
    public $num = 10;
    public $isActive = true;
    public $isOpenModal = false;
    public $isOpenModalExport = false;

    public $stockFilter;
    public $categoryFilter;
    public $lineFilter;
    public $brandFilter;

    #[Computed]
    public function brands()
    {
        return Brand::where('isActive', true)->get();
    }
    #[Computed]
    public function categories()
    {
        return Category::where('isActive', true)->get();
    }
    #[Computed]
    public function lines()
    {
        return Line::where('isActive', true)->get();
    }
    #[Computed]
    public function products()
    {
        return Product::query()
            ->when($this->lineFilter, function ($query) {
                $query->where('line_id', $this->lineFilter);
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category_id', $this->categoryFilter);
            })
            ->when($this->brandFilter, function ($query) {
                $query->where('brand_id', $this->brandFilter);
            })
            ->when($this->search, function ($query) {
                $query->where('code', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('code_fabrica', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('code_peru', 'LIKE', '%' . $this->search . '%');
            })
            ->when($this->stockFilter, function ($query) {
                $query->where('stock', '>=', $this->stockFilter);
            })
            ->where('isActive', $this->isActive)
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.almacen.product-live');
    }
    public function create()
    {
        $this->productForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Product $product)
    {
        $this->productForm->setProduct($product);
        $this->isOpenModal = true;
    }
    public function delete(Product $product)
    {
        if ($this->productForm->destroy($product->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Product $product)
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
    public function updateProduct()
    {
        if ($this->productForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }

    public function exportProduct()
    {
        $this->isOpenModalExport = false;
        return $this->productForm->export();
    }
    public function updatedLineFilter($value)
    {
        $this->resetPage();
    }
    public function updatedCategoryFilter($value)
    {
        $this->resetPage();
    }
    public function updatedBrandFilter($value)
    {
        $this->resetPage();
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    private function message($tipo, $tittle, $message)
    {
        $this->alert($tipo, $tittle, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
    public function export()
    {
        return Excel::download(new ProductsExport, 'product.xlsx');
    }
}
