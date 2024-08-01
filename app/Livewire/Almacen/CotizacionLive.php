<?php

namespace App\Livewire\Almacen;

use App\Models\CotizacionDetalle;
use App\Models\Customer;
use App\Models\Line;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CotizacionLive extends Component
{
    public $customer; //id cliente seleccionado por select2
    public $product; //id producto seleccionado por select2

    public $customerSelect; //Cliente seleccionado por select2
    public $productSelect; //Producto seleccionado por select2

    public $productos_cotizados = []; //lista de productos cotizados

    public $line_id; // select linea o marca
    public $cotizacionNew;
    public $cantitad_detalle = 1;
    public $price_cotizacion = 0;

    public function mount()
    {
        $this->customerSelect = Customer::first();
        $this->line_id = Line::first()->id;
    }

    public function render()
    {
        $items = Cart::content();
        $total = Cart::subtotal();
        $igv = (double)filter_var($total, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) / 1.18;
        $sub_total = (double)filter_var($total, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION)  - $igv;
        $customers = Customer::all();
        $products = Product::all();
        $lines = Line::all();
        return view('livewire.almacen.cotizacion-live', compact('customers', 'products', 'lines', 'items','total', 'igv', 'sub_total'));
    }
    public function updatedCustomer()
    {
        $this->customerSelect = Customer::find($this->customer);
    }
    public function updatedProduct()
    {
        $this->productSelect = Product::find($this->product);
    }
    public function AddProductCotizacion()
    {
        if (isset($this->productSelect)) {
            Cart::add(['id' => $this->productSelect->id,
                'name' => $this->productSelect->code,
                'qty' => $this->cantitad_detalle,
                'price' => $this->price_cotizacion,
                'weight' => 0]);
        }
    }
    public function delete($rowId){
        Cart::remove($rowId);
    }
    public function exportar()
    {

        $cotizacion = $this->cotizacionNew;
        $total_cotizacion = Cart::subtotal();

        $pdf = Pdf::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            ->setPaper('a4', 'portrait')
            ->loadView('livewire.almacen.report.cotizacion', compact('cotizacion', 'total_cotizacion'))
            ->output();
        return response()
            ->streamDownload(
                fn() => print($pdf),
                "sucamm.pdf"
            );
    }
}
