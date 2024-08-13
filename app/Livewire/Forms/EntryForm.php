<?php

namespace App\Livewire\Forms;


use App\Models\Inventory;
use App\Models\InventoryEntry;
use App\Models\ProductStore;
use Livewire\Attributes\Validate;
use Livewire\Form;


class EntryForm extends Form
{
    public ?InventoryEntry $entry;
    #[Validate('required')]
    public $inventory_id = '';
    #[Validate('required')]
    public $supplier_id = '';
    #[Validate('required')]
    public $description = '';
    #[Validate('required|min:5|unique:brands')]
    public $entry_code = '';
    #[Validate('required|numeric|min:0')]
    public $quantity = '';
    #[Validate('required|numeric|min:0')]
    public $unit_price = '';

    public function store($warehouse, $product, $supplier)
    {
        try {
            $inventario = Inventory::firstOrCreate(
                ['warehouse_id' => $warehouse->id, 'product_id' => $product],
                ['quantity' => 0]
            );
            
            $this->inventory_id = $inventario->id;
            $this->supplier_id = $supplier;
            $this->entry_code = ProductStore::find($product)->code_entrada;
            //dd(ProductStore::find($product)->code_entrada);
            //$this->validate();
            InventoryEntry::create([
                'inventory_id' => $this->inventory_id,
                'supplier_id' => $this->supplier_id,
                'description' => $this->description,
                'entry_code' => $this->entry_code,
                'quantity' => $this->quantity,
                'unit_price' => $this->unit_price
            ]);
            infoLog('InventoryEntry store', $this->entry_code);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryEntry store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->validate();
            $this->entry->update($this->all());
            infoLog('InventoryEntry update', $this->entry_code);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryEntry update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $entry = InventoryEntry::find($id);
            $entry->delete();
            infoLog('InventoryEntry deleted', $entry->entry_code);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryEntry deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $entry = InventoryEntry::find($id);
            $entry->isActive = !$entry->isActive;
            $entry->save();
            infoLog('InventoryEntry estado ' . $entry->isActive, $entry->name);
            return true;
        } catch (\Exception $e) {
            errorLog('InventoryEntry estado', $e);
            return false;
        }
    }
    public function export()
    {
        //return Excel::download(new InventoryEntrysExport, 'entrys.xlsx');
    }
}
