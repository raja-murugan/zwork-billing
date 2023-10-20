<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense_note_cost extends Model
{
    use HasFactory;

    protected $fillable = [
        'expenses_id',
        'note',
        'price',
        'soft_delete'
    ];
}
