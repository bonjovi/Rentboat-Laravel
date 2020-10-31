<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celebrity extends Model
{
    protected $fillable = [
        'name', 'status', 'quote', 'text', 'background', 'video'
    ];
}
