<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'unique_key',
        'billno',
        'date',
        'time',
        'customer_id',
        'bank_id',
        'bill_discount_type',
        'bill_discount',
        'bill_tax_percentage',
        'bill_add_on_note',
        'bill_sub_total',
        'bill_discount_price',
        'bill_total_amount',
        'bill_tax_amount',
        'bill_extracost_amount',
        'overall',
        'bill_grand_total',
        'bill_paid_amount',
        'bill_balance_amount',
        'soft_delete'
    ];
}
