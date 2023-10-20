<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillExtracost extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_id',
        'bill_extracost_note',
        'bill_extracost',
        'soft_delete'
    ];
}
