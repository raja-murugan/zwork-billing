<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_key',
        'name',
        'note',
        'soft_delete'
    ];

    public function expense()
    {
        return $this->hasMany(Expense::class, 'bank_id');
    }
}
