<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'customerNumber',
        'checkNumber',
        'paymentDate',
        'amount'
    ];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'checkNumber';
    }

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'customerNumber', 'customerNumber');
    }
}
