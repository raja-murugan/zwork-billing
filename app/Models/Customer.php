<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'unique_key',
        'name',
        'address',
        'phone_number',
        'email_id',
        'balance_amount',
        'soft_delete'
    ];
}
