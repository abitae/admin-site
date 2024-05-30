<?php

namespace App\Livewire\Convenio;

use App\Models\AcuerdoMarco;
use App\Models\ProductData;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    public $num = 10;
    public $convenioMarco;
    public $catalogoMarco;
    public $searchMarca;
    public $start_date;
    public $end_date;
    public $dateNow;

    public function mount()
    {
        $this->dateNow = Carbon::now('GMT-5')->format('Y-m-d');
        $this->start_date = now()->startOfDay();
        $this->end_date = now()->endOfDay();
    }
    #[Computed]
    public function acuerdosMarco()
    {
        return AcuerdoMarco::where('isActive', true)->get();
    }
    #[Computed]
    public function datas()
    {
        return ProductData::where('cod_acuerdo_marco', $this->convenioMarco)
            ->where('marca_ficha_producto', 'LIKE', '%' . $this->searchMarca . '%')
            ->where(
                fn($query)
                => $query
                    ->orWhere('orden_electronica', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('ruc_proveedor', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('ruc_entidad', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('razon_proveedor', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('razon_entidad', 'LIKE', '%' . $this->search . '%')
            )
            ->orderBy('fecha_aceptacion', 'asc')
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.convenio.product-live');
    }
    public function updatedConvenioMarco($value)
    {
        $this->resetPage();
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    public function updatedStartDate()
    {
        $this->resetPage();
    }

    public function updatedEndDate()
    {
        $this->resetPage();
        $this->render();
    }
}
