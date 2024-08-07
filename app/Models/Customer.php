<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_code',
        'code',
        'first_name',
        'last_name',
        'date_brinday',
        'phone',
        'email',
        'address',
        'isActive',
    ];
    public function negocios()
    {
        return $this->hasMany(Negocio::class);
    }
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class);
    }
    public function orders()
    {
        //return $this->hasMany(Order::class);
    }
}
