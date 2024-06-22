<?php

namespace App\Livewire\Forms;

use App\Exports\CustomersExport;
use App\Models\Customer;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

class CustomerForm extends Form
{
    public ?Customer $customer;
    #[Validate('required|min:3|max:3')]
    public $type_code;
    #[Validate('required|numeric|digits_between:8,11|unique:customers')]
    public $code = '';
    #[Validate('required')]
    public $first_name = '';
    #[Validate('required')]
    public $last_name = 'last_name';
    #[Validate('required')]
    public $date_brinday = '';
    #[Validate('required')]
    public $phone = '';
    #[Validate('required|email')]
    public $email = '';
    #[Validate('required')]
    public $address = '';
    public $isActive = false;
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        $this->type_code = $customer->type_code;
        $this->code = $customer->code;
        $this->first_name = $customer->first_name;
        $this->last_name = $customer->last_name;
        $this->date_brinday = $customer->date_brinday;
        $this->phone = $customer->phone;
        $this->email = $customer->email;
        $this->address = $customer->address;
    }
    public function store()
    {
        $this->validate();

        try {
            Customer::create([
                'type_code' => $this->type_code,
                'code' => $this->code,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'date_brinday' => $this->date_brinday,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
            ]);
            infoLog('Customer store', $this->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Customer store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->customer->update([
                'type_code' => $this->type_code,
                'code' => $this->code,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'date_brinday' => $this->date_brinday,
                'phone' => $this->phone,
                'email' => $this->email,
                'address' => $this->address,
            ]);
            infoLog('Customer update', $this->code);
            Storage::delete('public/tmp');
            return true;
        } catch (\Exception $e) {
            errorLog('Customer update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $customer = Customer::find($id);
            $customer->delete();
            infoLog('Customer deleted', $customer->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Customer deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $customer = Customer::find($id);
            $customer->isActive = !$customer->isActive;
            $customer->save();
            infoLog('Customer estado ' . $customer->isActive, $customer->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Customer estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new CustomersExport, 'customers.xlsx');
    }
}
