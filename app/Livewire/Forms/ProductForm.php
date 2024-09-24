<?php

namespace App\Livewire\Forms;

use App\Exports\ProductsExport;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;

class ProductForm extends Form
{
    public ?Product $product;
    #[Validate('required|min:1')]
    public $brand_id = '';
    #[Validate('required|min:1')]
    public $category_id = '';
    #[Validate('required|min:1')]
    public $line_id = '';
    #[Validate('required|min:5|unique:products')]
    public $code = '';
    #[Validate('required')]
    public $code_fabrica = '';
    #[Validate('required')]
    public $code_peru = '';
    #[Validate('required|numeric|min:0')]
    public $price_compra = '';
    #[Validate('required|numeric|min:0')]
    public $price_venta = '';
    #[Validate('required|numeric|min:0')]
    public $porcentaje = '';
    #[Validate('required')]
    public $stock = '';
    #[Validate('required')]
    public $dias_entrega = '';
    #[Validate('required')]
    public $description = '';//
    public $tipo = '';
    public $color = '';
    #[Validate('required')]
    public $garantia = '';
    public $observaciones = '';
    #[Validate('nullable|sometimes|image|max:10960|mimes:jpeg,jpg,png|extensions:jpeg,jpg,png')]
    public $image = '';
    #[Validate('nullable|sometimes|mimes:pdf|max:10960|extensions:pdf')] // 1MB Max
    public $archivo = '';
    #[Validate('nullable|sometimes|mimes:pdf|max:10960|extensions:pdf')] // 1MB Max
    public $archivo2 = '';
    public $isActive = false;
    public function setProduct(Product $product)
    {
        $this->product = $product;
        $this->brand_id = $product->brand_id;
        $this->category_id = $product->category_id;
        $this->line_id = $product->line_id;
        $this->code = $product->code;
        $this->code_fabrica = $product->code_fabrica;
        $this->code_peru = $product->code_peru;
        $this->price_compra = $product->price_compra;
        $this->price_venta = $product->price_venta;
        $this->porcentaje = $product->porcentaje;
        $this->stock = $product->stock;
        $this->dias_entrega = $product->dias_entrega;
        $this->description = $product->description;
        $this->tipo = $product->tipo;
        $this->color = $product->color;
        $this->garantia = $product->garantia;
        $this->observaciones = $product->observaciones;
        $this->image = $product->image;
        $this->archivo = $product->archivo;
        $this->archivo2 = $product->archivo2;
    }
    public function store()
    {
        
        try {
            $this->validate();
            if (gettype($this->image) != 'string') {
                $this->image = $this->image->store('product/image');
            }
            if (gettype($this->archivo) != 'string') {
                $this->archivo = $this->archivo->store('product/pdf');
            }
            if (gettype($this->archivo2) != 'string') {
                $this->archivo2 = $this->archivo2->store('product/pdf2');
            }
            Product::create([
                'brand_id' => $this->brand_id,
                'category_id' => $this->category_id,
                'line_id' => $this->line_id,
                'code' => $this->code,
                'code_fabrica' => $this->code_fabrica,
                'code_peru' => $this->code_peru,
                'price_compra' => $this->price_compra,
                'price_venta' => $this->price_venta,
                'porcentaje' => $this->porcentaje,
                'stock' => $this->stock,
                'dias_entrega' => $this->dias_entrega,
                'description' => $this->description,
                'tipo' => $this->tipo,
                'color' => $this->color,
                'garantia' => $this->garantia,
                'observaciones' => $this->observaciones,
                'image' => $this->image,
                'archivo' => $this->archivo,
                'archivo2' => $this->archivo2,
            ]);
            infoLog('Product store', $this->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Product store', $e);
            return false;
        }
    }
    public function update()
    {

        try {

            if (gettype($this->image) != 'string') {
                Storage::delete($this->product->image);
                $this->image = $this->image->store('product/image');
            }
            if (gettype($this->archivo) != 'string') {
                Storage::delete($this->product->archivo);
                $this->archivo = $this->archivo->store('product/pdf');
            }
            if (gettype($this->archivo2) != 'string') {
                $this->archivo2 = $this->archivo2->store('product/pdf2');
            }
            $this->product->update([
                'brand_id' => $this->brand_id,
                'category_id' => $this->category_id,
                'line_id' => $this->line_id,
                'code' => $this->code,
                'code_fabrica' => $this->code_fabrica,
                'code_peru' => $this->code_peru,
                'price_compra' => $this->price_compra,
                'price_venta' => $this->price_venta,
                'porcentaje' => $this->porcentaje,
                'stock' => $this->stock,
                'dias_entrega' => $this->dias_entrega,
                'description' => $this->description,
                'tipo' => $this->tipo,
                'color' => $this->color,
                'garantia' => $this->garantia,
                'observaciones' => $this->observaciones,
                'image' => $this->image,
                'archivo' => $this->archivo,
                'archivo2' => $this->archivo2,
            ]);
            infoLog('Product update', $this->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Product update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            $product->delete();
            infoLog('Product deleted', $product->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Product deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $product = Product::find($id);
            $product->isActive = !$product->isActive;
            $product->save();
            infoLog('Product estado ' . $product->isActive, $product->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Product estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
}
