<?php

namespace App\Livewire\Almacen;

use App\Models\CotizacionDetalle;
use App\Models\Customer;
use App\Models\Line;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public $product_id_detalle;
    public $cantitad_detalle = 1;
    public $price_cotizacion = 0;
    public $total_cotizacion = 0;
    public function mount()
    {
        $this->customerSelect = Customer::first();
        $this->line_id = Line::first()->id;
    }

    public function render()
    {
        $customers = Customer::all();
        $products = Product::all();
        $lines = Line::all();
        return view('livewire.almacen.cotizacion-live', compact('customers', 'products', 'lines'));
    }
    public function updatedCustomer()
    {
        $this->customerSelect = Customer::find($this->customer);
    }
    public function updatedProduct()
    {
        $this->productSelect = Product::find($this->product);
        $this->price_cotizacion = $this->productSelect->price_venta;
    }
    public function AddProductCotizacion()
    {
        $item_cotizacion = new CotizacionDetalle();
        if (isset($this->productSelect)) {
            $item_cotizacion->product_id = $this->productSelect->id;
            $item_cotizacion->cantidad = $this->cantitad_detalle;
            $item_cotizacion->price_cotizacion = $this->price_cotizacion;
            $this->productos_cotizados = array_push($item_cotizacion);
            dd($$this->productos_cotizados);
        }
    }
    public function exportar()
    {
        $cotizacion = $this->cotizacionNew;
        $total_cotizacion = $this->total_cotizacion;

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
