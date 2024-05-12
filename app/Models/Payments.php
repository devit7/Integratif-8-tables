<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $table = 'payments';

    public function getRouteKeyName()
    {
        return 'customerNumber';
    }

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customerNumber', 'customerNumber');
    }
}
