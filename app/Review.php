<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'user_id', 'boat_id', 'text', 'rating', 'avatar', 'role_id', 'password',
    ];
}
