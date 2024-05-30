<?php

namespace App\Livewire\Config;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsLive extends Component
{
    use LivewireAlert;
    public $permissions = [];
    public Role $role;
    public function mount(Role $id)
    {
        $this->role = $id;
        $this->permissions = $id->permissions->pluck('name');
    }
    public function render()
    {
        $user_p = Permission::where('name', 'LIKE', '%' . 'usuarios' . '%')->pluck('name');
        return view('livewire.config.permissions-live', compact('user_p'))->layout('components.layouts.app');

    }
    public function update()
    {
        try {
            $this->role->syncPermissions($this->permissions);
            infoLog('Permision role', $this->role->name);
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
        } catch (\Exception $e) {
            errorLog('Permision role', $e);
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
