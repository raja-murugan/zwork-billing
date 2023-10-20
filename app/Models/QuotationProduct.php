<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'product_id',
        'width',
        'height',
        'qty',
        'areapersqft', // Area-Sq.ft
        'rate',
        'product_total',
        'soft_delete'
    ];
}
