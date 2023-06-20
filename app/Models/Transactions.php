<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';  // Optional

    protected $fillable = [
        'packages_id',
        'user_id',
        'ammount',
        'transaction_code',
        'transaction_status'
    ];
}
