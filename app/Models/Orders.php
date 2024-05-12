<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function getRouteKeyName()
    {
        return 'orderNumber';
    }

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customerNumber', 'customerNumber');
    }

    public function product(){
        return $this->belongsToMany(Products::class, 'orderdetails', 'orderNumber', 'productCode')->withPivot('quantityOrdered', 'priceEach', 'orderLineNumber');
    }
}
