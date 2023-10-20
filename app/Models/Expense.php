<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_key',
        'expence_number',
        'date',
        'time',
        'bank_id',
        'grand_total',
        'add_on_note',
        'soft_delete'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
}
