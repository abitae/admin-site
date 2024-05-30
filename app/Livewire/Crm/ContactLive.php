<?php

namespace App\Livewire\Crm;

use App\Livewire\Forms\ContactForm;
use App\Models\Contact;
use Carbon\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class ContactLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    use WithFileUploads;
    public ContactForm $contactForm;
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
    public function contacts()
    {

        return Contact::where(
            fn($query)
            => $query->orWhere('code', 'LIKE', '%' . $this->search . '%')
                ->orWhere('first_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('last_name', 'LIKE', '%' . $this->search . '%')
                ->orWhere('email', 'LIKE', '%' . $this->search . '%')
        )
            ->paginate($this->num, '*', 'page');
        /* 
           return Contact::query()
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
        return view('livewire.crm.contact-live');
    }
    public function create()
    {
        $this->contactForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Contact $contact)
    {
        $this->contactForm->setContact($contact);
        $this->isOpenModal = true;
    }
    public function delete(Contact $contact)
    {
        if ($this->contactForm->destroy($contact->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Contact $contact)
    {
        if ($this->contactForm->estado($contact->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createContact()
    {
        if ($this->contactForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateContact()
    {
        if ($this->contactForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportContact()
    {
        $this->isOpenModalExport = false;
        return $this->contactForm->export();
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
