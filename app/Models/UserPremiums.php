<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPremiums extends Model
{
    use HasFactory;

    protected $table = 'user_premiums'; //Optional

    protected $fillable = [
        'packages_id',
        'user_id',
        'end_of_subcription'
    ];
}
