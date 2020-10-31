<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class City extends Model
{
    protected $fillable = [
        'name', 'slug', 'country_id'
    ];

    use Translatable;
    protected $translatable = ['name', 'description'];
}
