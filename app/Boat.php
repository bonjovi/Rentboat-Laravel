<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Boat extends Model
{
    use HasTags;

    protected $fillable = [
        'name', 'slug', 'thumbnails', 'city_id', 'type_id', 'year', 'size', 'guests_qty', 'bedrooms_qty', 'showers_qty', 'sleepers_qty', 'with_capitan', 'instant_confirmation', 'fuel_included', 'additionally_included', 'documents', 'description', 'price', 'saleprice'
    ];

    public function getBoats() {
        return Product::where('id', '>', '0')->get();
    }
}
