<?php

namespace App\Livewire\Crm;

use App\Livewire\Forms\NegocioForm;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Negocio;
use Livewire\Component;

class DetailNegocioLive extends Component
{
    public NegocioForm $negocioForm;
    public $customer_id;
    public $employee_id;
    public function mount(?Negocio $id)
    {
        $this->negocioForm->setNegocio($id);
    }
    public function render()
    {   
        $customers = Customer::all();
        $employees = Employee::all();
        return view('livewire.crm.detail-negocio-live',compact('customers','employees'));
    }
}
