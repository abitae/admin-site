<?php

namespace App\Livewire\Inventario;

use App\Livewire\Forms\ExitForm;
use App\Models\CodeExit;
use App\Models\ProductStore;
use App\Models\Customer;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class ExitLive extends Component
{
    use LivewireAlert;
    public $warehouse;
    public $product = 1; //select2
    public $customer = 1; //select2
    public ExitForm $entryForm;
    public function mount($id)
    {
        $this->warehouse = Warehouse::find($id);
    }
    public function render()
    {
        $customers = Customer::all();
        $products = ProductStore::all();
        $exit_codes = CodeExit::where('product_store_id',$this->product)->get();
        return view('livewire.inventario.exit-live', compact('customers', 'products','exit_codes'));
    }
    public function createExit()
    {
        if ($this->entryForm->store($this->warehouse, $this->product, $this->customer)) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->entryForm->reset();
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
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
