<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id',
        'category_id',
        'line_id',
        'code',
        'code_fabrica',
        'code_peru',
        'price_compra',
        'price_venta',
        'porcentaje',
        'stock',
        'dias_entrega',
        'description',
        'tipo',
        'color',
        'garantia',
        'observaciones',
        'image',
        'archivo',
        'isActive',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function line(){
        return $this->belongsTo(Line::class);
    }
    public function cotizaciondetalles()
    {
        return $this->hasMany(CotizacionDetalle::class);
    }
}
