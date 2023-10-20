<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationExtracost extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id',
        'extracost_note',
        'extracost',
        'soft_delete'
    ];
}
