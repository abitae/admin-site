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
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        $options = [
            ['value' => 1, 'label' => 'Opción 1'],
            ['value' => 2, 'label' => 'Opción 2'],
            ['value' => 3, 'label' => 'Opción 3'],
        ];

        return view('livewire.crm.negocio-live', compact('options'))->layout('components.layouts.app');;
    }
    public function detail(Negocio $id){
        return \Redirect::route('crm.detail', [$id]);
    }
    public function create()
    {
        $this->negocioForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Negocio $negocio)
    {
        $this->negocioForm->setNegocio($negocio);
        $this->isOpenModal = true;
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
    public function createNegocio()
    {
        if ($this->negocioForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateNegocio()
    {
        if ($this->negocioForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
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
