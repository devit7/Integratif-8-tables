<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productlines extends Model
{
    use HasFactory;

    protected $table = 'productlines';

    public function getRouteKeyName()
    {
        return 'productLine';
    }

    public function products()
    {
        return $this->hasMany(Products::class, 'productLine', 'productLine');
    }

}
