<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;
use TCG\Voyager\Traits\Translatable;

class Boat extends Model
{
    use HasTags;
    use Translatable;
    protected $translatable = ['name', 'description'];

    protected $fillable = [
        'name', 'slug', 'description', 'mainpic', 'thumbnail1', 'thumbnail2', 'thumbnail3', 'city_id', 'type_id', 'year', 'size', 'owner_id', 'guests_qty', 'bedrooms_qty', 'showers_qty', 'sleepers_qty', 'with_capitan', 'instant_confirmation', 'fuel_included', 'additionally_included', 'documents', 'price', 'saleprice', 'is_approved'
    ];

    public function getBoats() {
        return Product::where('id', '>', '0')->get();
    }
}
