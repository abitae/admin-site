<?php

namespace App\Livewire\Crm;

use App\Livewire\Forms\CustomerForm;
use App\Models\Customer;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CustomerLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    use WithFileUploads;
    public CustomerForm $customerForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;

    public $dateNow;

    public function mount()
    {
        $this->dateNow = Carbon::now('GMT-5')->format('Y-m-d');
    }
    #[Computed]
    public function customers()
    {

        return Customer::where(
            fn($query)
            => $query->orWhere('code', 'LIKE', '%' . $this->search . '%')
                ->orWhere('first_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
        )
            ->paginate($this->num, '*', 'page');
        /* 
           return Customer::query()
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
            ->paginate($this->num, '*', 'page');
            */

    }
    public function render()
    {
        return view('livewire.crm.customer-live');
    }
    public function create()
    {
        $this->customerForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Customer $customer)
    {
        $this->customerForm->setCustomer($customer);
        $this->isOpenModal = true;
    }
    public function delete(Customer $customer)
    {
        if ($this->customerForm->destroy($customer->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Customer $customer)
    {
        if ($this->customerForm->estado($customer->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createCustomer()
    {
        if ($this->customerForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function buscarDocumento()
    {
       dd(buscar_documento_h('ruc','10436493903')['data']);
    }
    public function updateCustomer()
    {
        if ($this->customerForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportCustomer()
    {
        $this->isOpenModalExport = false;
        return $this->customerForm->export();
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

}
