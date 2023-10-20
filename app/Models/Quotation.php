<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;


    protected $fillable = [
        'unique_key',
        'quotation_number',
        'date',
        'time',
        'customer_id',
        'discount_type',
        'discount',
        'tax_percentage',
        'add_on_note',
        'sub_total',
        'discount_price',
        'total_amount',
        'tax_amount',
        'extracost_amount',
        'overall',
        'grand_total',
        'soft_delete'
    ];
}
