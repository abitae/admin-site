<?php

namespace App\Livewire\Forms;

use App\Exports\LinesExport;
use App\Models\Line;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\LaravelIgnition\Recorders\LogRecorder\LogMessage;

class LineForm extends Form
{
    public ?Line $line;
    #[Validate('required|min:5|unique:lines')]
    public $code = '';
    public $name = '';
    public $isActive = false;
    public function setLine(Line $line)
    {
        $this->line = $line;
        $this->code = $line->code;
        $this->name = $line->name;
    }
    public function store()
    {
        try {
            $this->validate();
            Line::create($this->all());
            infoLog('Line store', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Line store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->line->update([
                'code' => $this->code,
                'name' => $this->name,
            ]);
            infoLog('Line update', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Line update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $line = Line::find($id);
            $line->delete();
            infoLog('Line deleted', $line->email);
            return true;
        } catch (\Exception $e) {
            errorLog('Line deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $line = Line::find($id);
            $line->isActive = !$line->isActive;
            $line->save();
            infoLog('Line estado ' . $line->isActive, $line->email);
            return true;
        } catch (\Exception $e) {
            errorLog('Line estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new LinesExport, 'lines.xlsx');
    }
}
