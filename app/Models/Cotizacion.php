<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'customer_id',
        'user_id',
        'line_id',
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function line(){
        return $this->belongsTo(Line::class);
    }
    public function cotizaciondetalles()
    {
        return $this->hasMany(CotizacionDetalle::class);
    }
}
