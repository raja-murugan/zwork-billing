<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'vendor_id',
        'customer_amount',
        'customer_paid',
        'customer_balance',
        'vendor_amount',
        'vendor_paid',
        'vendor_balance',
        'soft_delete'
    ];
}
