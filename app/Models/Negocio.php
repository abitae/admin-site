<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'employee_id',
        'code',
        'name',
        'date_closing',
        'priority',
        'monto_aprox',
        'stage',
        'description',
        'isActive',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}

