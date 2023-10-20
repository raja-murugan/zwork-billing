<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseProduct extends Model
{
    use HasFactory;


    protected $fillable = [
        'purchase_id',
        'purchase_productid',
        'purchase_quantity',
        'purchase_rateperquantity',
        'purchase_producttotal',
        'soft_delete'
    ];
}
