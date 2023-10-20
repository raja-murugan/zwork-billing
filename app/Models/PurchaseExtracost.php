<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseExtracost extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'purchase_extracostnote',
        'purchase_extracost',
        'soft_delete'
    ];
}
