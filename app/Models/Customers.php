<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $table = 'customers';

    public function getRouteKeyName()
    {
        return 'customerNumber';
    }

    public function employees()
    {
        return $this->belongsTo(Employees::class, 'salesRepEmployeeNumber', 'employeeNumber');
    }

    public function payments()
    {
        return $this->hasMany(Payments::class, 'customerNumber', 'customerNumber');
    }

    public function orders()
    {
        return $this->hasMany(Orders::class, 'customerNumber', 'customerNumber');
    }
}
