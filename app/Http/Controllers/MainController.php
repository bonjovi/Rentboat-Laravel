<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boat;
use App\Review;
use App\Country;

class MainController extends Controller
{
    public function index() {
        $boats = Boat::select(
            'boats.*',
            'types.name as type_name',
            'cities.name as city_name',
            'countries.name as country_name'
        )
            ->join('types', 'boats.type_id', '=', 'types.id')
            ->join('cities', 'boats.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->get();
        $mainpage = true;

        $reviews = Review::select(
            'reviews.*',
            'boats.name as boat_name',
            'boats.mainpic as boat_mainpic',
            'boats.year as boat_year',
            'types.name as boat_type_name',
            'boats.guests_qty as boat_guests_qty',
            'boats.sleepers_qty as boat_sleepers_qty',
            'boats.size as boat_size',
            'boats.slug as boat_slug',
            'cities.name as city_name',
            'countries.name as country_name',
            'users.name as user_name',
            'users.role_id as user_role_id',
            'users.avatar as user_avatar'
        )
            ->join('boats', 'reviews.boat_id', '=', 'boats.id')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->join('types', 'boats.type_id', '=', 'types.id')
            ->join('cities', 'boats.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->get();

        $countries = Country::all();

        return view('index', compact('boats', 'mainpage', 'reviews', 'countries'));
    }

    public function catalog() {
        return view('catalog');
    }

    public function product() {
        return view('product');
    }
}
