<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $table = 'employees';


    public function getRouteKeyName()
    {
        return 'employeeNumber';
    }

    public function offices()
    {
        return $this->belongsTo(Offices::class, 'officeCode', 'officeCode');
    }

    public function customers()
    {
        return $this->hasMany(Customers::class, 'salesRepEmployeeNumber', 'employeeNumber');
    }


}
