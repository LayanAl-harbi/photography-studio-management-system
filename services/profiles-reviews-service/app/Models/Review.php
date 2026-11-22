<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'booking_id',
        'client_user_id',
        'photographer_id',
        'rating',
        'comment',
    ];
}
