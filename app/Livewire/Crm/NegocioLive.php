<?php

namespace App\Livewire\Crm;

use App\Livewire\Forms\NegocioForm;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Negocio;
use App\Models\User;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class NegocioLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    use WithFileUploads;
    public NegocioForm $negocioForm;
    public $search = '';
    public $num = 10;
    public $isActive = 1;
    public $isOpenModal = false;
    public $isOpenModalExport = false;
    public $dateNow;
    public $selectedOption;
    protected $listeners = ['select2Changed' => 'handleSelect2Changed'];

    public function handleSelect2Changed($value)
    {
        $this->selectedOption = $value;
    }
    public function mount()
    {
        $this->dateNow = Carbon::now('GMT-5')->format('Y-m-d');
    }
    #[Computed]
    public function negocios()
    {
        $search = $this->search;
        return Negocio::where(
            fn ($query)
            => $query->orWhereHas('customer', function ($query) use ($search) {
                $query->where('code', 'like', '%' . $search . '%');
            })
                ->orWhereHas('customer', function ($query) use ($search) {
                    $query->where('first_name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('email', 'like', '%' . $search . '%');
                })
                ->orWhere('code', 'LIKE', '%' . $search . '%')
                ->orWhere('name', 'LIKE', '%' . $search . '%')
            )
            ->where('isActive', $this->isActive)
            ->latest()
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        $customers = Customer::all();
        $users = User::all();
        return view('livewire.crm.negocio-live', compact('customers', 'users'))->layout('components.layouts.app');;
    }
    public function detail(Negocio $id)
    {
        return \Redirect::route('crm.detail', [$id]);
    }

    public function create()
    {
        $this->negocioForm->reset();
        $this->isOpenModal = true;
    }
    public function createNegocio()
    {

        if ($this->negocioForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function update(Negocio $negocio)
    {
        $this->negocioForm->setNegocio($negocio);
        $this->isOpenModal = true;
    }
    public function updateNegocio()
    {
        //dd($this->negocioForm->negocio);
        if ($this->negocioForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }

    public function delete(Negocio $negocio)
    {
        if ($this->negocioForm->destroy($negocio->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Negocio $negocio)
    {
        if ($this->negocioForm->estado($negocio->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }

    public function exportNegocio()
    {
        $this->isOpenModalExport = false;
        return $this->negocioForm->export();
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
