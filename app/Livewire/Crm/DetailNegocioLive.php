<?php

namespace App\Livewire\Crm;

use App\Livewire\Forms\NegocioForm;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Negocio;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DetailNegocioLive extends Component
{
    use LivewireAlert;
    public NegocioForm $negocioForm;
    public $customer;
    public $employee;
    public function mount(Negocio $id)
    {
        if (isset($id) ) {
            $this->negocioForm->setNegocio($id);
        }
    }
    public function render()
    {
        $customers = Customer::all();
        $employees = Employee::all();
        return view('livewire.crm.detail-negocio-live', compact('customers', 'employees'));
    }
    public function updateNegocio()
    {
        if ($this->negocioForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }

    public function updatedCustomer() {
        $this->negocioForm->customer_id = $this->customer;
    }
    public function updatedEmployee() {
        $this->negocioForm->employee_id = $this->employee;
    }
    private function message($tipo, $tittle, $message)
    {
        $this->alert($tipo, $tittle, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => false,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
