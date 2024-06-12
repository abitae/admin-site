<?php

namespace App\Livewire\Crm;

use App\Livewire\Forms\NegocioForm;
use App\Models\Negocio;
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

        return Negocio::where(
            fn($query)
            => $query->orWhere('code', 'LIKE', '%' . $this->search . '%')
                ->orWhere('name', 'LIKE', '%' . $this->search . '%')
        )
        ->latest()
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.crm.negocio-live')->layout('components.layouts.app');
        ;
    }
    public function detail(Negocio $id)
    {
        return \Redirect::route('crm.detail', [$id]);
    }

    public function create()
    {
        return \Redirect::route('crm.detailnew');
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
