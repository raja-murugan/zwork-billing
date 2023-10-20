<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;


    protected $fillable = [
        'unique_key',
        'purchase_number',
        'vocher_number',
        'date',
        'time',
        'vendor_id',
        'bank_id',
        'purchase_discounttype',
        'purchase_discount',
        'purchase_taxpercentage',
        'purchase_addon_note',
        'purchase_subtotal',
        'purchase_discountprice',
        'purchase_totalamount',
        'purchase_taxamount',
        'purchase_extracostamount',
        'overall',
        'purchase_grandtotal',
        'purchase_paidamount',
        'purchase_balanceamount',
        'soft_delete'
    ];
}
