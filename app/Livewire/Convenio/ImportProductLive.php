<?php

namespace App\Livewire\Convenio;

use App\Imports\ProductsImport;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

class ImportProductLive extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Validate('required')]
    public $file;
    public function render()
    {
        return view('livewire.convenio.import-product-live');
    }
    public function import()
    {
        try {
            Excel::import(new ProductsImport, $this->file);
            $this->message('success', 'En hora buena!', 'Archivo procesado correctamente!');
            $this->file = null;
            infoLog('CM import', \Auth::user()->email);
        } catch (\Exception $e) {
            $this->message('error', 'Error!', 'No se pudo procesar el archivo!');
            $this->file = null;
            errorLog('CM import', $e);
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
