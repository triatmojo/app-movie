<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
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

    public function package()
    {
        return $this->belongsTo(Package::class, 'packages_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
