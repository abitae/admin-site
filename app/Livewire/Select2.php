<?php

namespace App\Livewire;

use Livewire\Component;

class Select2 extends Component
{
    public $options;
    public $selectedOption;

    public function mount($options = [])
    {
        $this->options = $options;
    }
    public function render()
    {
        return view('livewire.select2');
    }
    public function updatedSelectedOption($value)
    {
        $this->emit('select2Changed', $value);
    }
}
