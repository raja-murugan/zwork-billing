<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_key',
        'customer_id',
        'bank_id',
        'date',
        'time',
        'oldblance',
        'discount',
        'totalamount',
        'paid_amount',
        'payment_pending',
        'note',
        'soft_delete'
    ];
}
