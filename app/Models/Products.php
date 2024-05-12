<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function getRouteKeyName()
    {
        return 'productCode';
    }

    public function productlines()
    {
        return $this->belongsTo(Productlines::class, 'productLine', 'productLine');
    }

    public function order(){
        return $this->belongsToMany(Orders::class, 'orderdetails', 'productCode', 'orderNumber');
    }
}
