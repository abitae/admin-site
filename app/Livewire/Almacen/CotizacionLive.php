<?php

namespace App\Livewire\Almacen;

use App\Models\Cotizacion;
use App\Models\CotizacionDetalle;
use App\Models\Customer;
use App\Models\Line;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PDF;

class CotizacionLive extends Component
{
    public $customer;
    public $customerSelect;
    public $product;
    public $productSelect;
    public $cotizacionNew;
    public $line_id;
    public $product_id_detalle;
    public $cantitad_detalle = 1;
    public $price_cotizacion = 0;
    public $total_cotizacion = 0;
    public function mount()
    {
        $this->customerSelect = Customer::first();
        $this->line_id = Line::first()->id;
        $user_id = Auth::id();
        $this->cotizacionNew = Cotizacion::create([
            'code' => \Carbon\Carbon::now()->format('YmdHis'),
            'customer_id' => $this->customerSelect->id,
            'user_id' => $user_id,
            'line_id' => $this->line_id,
            'estado' => false,
        ]);
    }
    public function render()
    {
        $customers = Customer::all();
        $products = Product::all();
        $lines = Line::all();
        $detalles = CotizacionDetalle::where('cotizacion_id', $this->cotizacionNew->id)->get();
        return view('livewire.almacen.cotizacion-live', compact('customers', 'products', 'lines', 'detalles'));
    }
    public function updatedCustomer()
    {
        $this->customerSelect = Customer::find($this->customer);
        $this->updateCotizacion();
    }
    public function updatedProduct()
    {
        $this->productSelect = Product::find($this->product);
        $this->price_cotizacion = $this->productSelect->price_venta;
    }
    private function updateCotizacion()
    {
        $this->cotizacionNew->customer_id = $this->customerSelect->id;
        $this->cotizacionNew->line_id = $this->line_id;
        $this->cotizacionNew->save();
    }
    public function AddProductCotizacion()
    {
        if ($this->productSelect) {
            $item = CotizacionDetalle::where('cotizacion_id', $this->cotizacionNew->id)
                ->where('product_id', $this->productSelect->id)
                ->first();
            if (isset($item)) {
                $item->cantidad += $this->cantitad_detalle;
                $item->save();
            } else {
                CotizacionDetalle::create([
                    'cotizacion_id' => $this->cotizacionNew->id,
                    'product_id' => $this->productSelect->id,
                    'cantidad' => $this->cantitad_detalle,
                    'price_cotizacion' => $this->price_cotizacion,
                ]);
            }
            $productos_cotizados = CotizacionDetalle::where('cotizacion_id', $this->cotizacionNew->id)
                ->get();
            $this->total_cotizacion = 0;
            foreach ($productos_cotizados as $product) {
                $this->total_cotizacion += ($product->cantidad * $product->price_cotizacion);
            }
            $this->cantitad_detalle = 1;
            $this->price_cotizacion = 0;
            $this->productSelect = null;
        }

    }
    public function exportar()
    {
        $cotizacion = $this->cotizacionNew;
        $total_cotizacion = $this->total_cotizacion;

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
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

