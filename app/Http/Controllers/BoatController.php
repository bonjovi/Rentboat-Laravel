<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boat;
use App\Review;
use App\Country;
use App\City;
use App\User;
use Carbon\Carbon;

use App\Http\Controllers\Session;
use Validator;
use Input;

class BoatController extends Controller
{
    public function index($language, Request $request) {




        $filter_queries_array = array();

        // PRICE
        if($request->input('min_price') != '' && $request->input('max_price') != '') {
            array_push(
                $filter_queries_array,
                ['price', '>=', (int)$request->input('min_price')],
                ['price', '<=', (int)$request->input('max_price')]
            );
        }

        if($request->input('min_price') != '') {
            array_push(
                $filter_queries_array,
                ['price', '>=', (int)$request->input('min_price')]
            );
        }

        if($request->input('max_price') != '') {
            array_push(
                $filter_queries_array,
                ['price', '<=', (int)$request->input('max_price')]
            );
        }

        // YEAR
        if($request->input('min_year') != '' && $request->input('max_year') != '') {
            array_push(
                $filter_queries_array,
                ['year', '>=', (int)$request->input('min_year')],
                ['year', '<=', (int)$request->input('max_year')]
            );
        }

        if($request->input('min_year') != '') {
            array_push(
                $filter_queries_array,
                ['year', '>=', (int)$request->input('min_year')]
            );
        }

        if($request->input('max_year') != '') {
            array_push(
                $filter_queries_array,
                ['year', '<=', (int)$request->input('max_year')]
            );
        }

        // WITH CAPITAN
        if($request->input('with_capitan') != '') {
            array_push(
                $filter_queries_array,
                ['with_capitan', '=', 1]
            );
        }

        // INSTANT CONFIRMATION
        if($request->input('instant_confirmation') != '') {
            array_push(
                $filter_queries_array,
                ['instant_confirmation', '=', 1]
            );
        }

        // FUEL INCLUDED
        if($request->input('fuel_included') != '') {
            array_push(
                $filter_queries_array,
                ['fuel_included', '=', 1]
            );
        }

        // SIZE
        if($request->input('min_size') != '' && $request->input('max_size') != '') {
            array_push(
                $filter_queries_array,
                ['size', '>=', (int)$request->input('min_size')],
                ['size', '<=', (int)$request->input('max_size')]
            );
        }

        if($request->input('min_size') != '') {
            array_push(
                $filter_queries_array,
                ['size', '>=', (int)$request->input('min_size')]
            );
        }

        if($request->input('max_size') != '') {
            array_push(
                $filter_queries_array,
                ['size', '<=', (int)$request->input('max_size')]
            );
        }

        // GUESTS
        if($request->input('min_guests') != '' && $request->input('max_guests') != '') {
            array_push(
                $filter_queries_array,
                ['guests_qty', '>=', (int)$request->input('min_guests')],
                ['guests_qty', '<=', (int)$request->input('max_guests')]
            );
        }

        if($request->input('min_guests') != '') {
            array_push(
                $filter_queries_array,
                ['guests_qty', '>=', (int)$request->input('min_guests')]
            );
        }

        if($request->input('max_guests') != '') {
            array_push(
                $filter_queries_array,
                ['guests_qty', '<=', (int)$request->input('max_guests')]
            );
        }

        // CITY
        if($request->input('city') != '') {
            $city = City::where('name', '=', $request->input('city'))->first();
            if($city) {
                array_push(
                    $filter_queries_array,
                    ['city_id', '=', $city->id]
                );
            } else {
                array_push(
                    $filter_queries_array,
                    ['city_id', '=', 1000000000]
                );
            }
        }

        // SALE
        if($request->input('sale') != '') {
            array_push(
                $filter_queries_array,
                ['saleprice', '>', 0]
            );
        }

        if($request->input('orderby') != '') {
            if($request->input('orderby') == 'price_high_to_low') {
                $orderByField = 'price';
                $orderByValue = 'desc';
            } elseif($request->input('orderby') == 'price_low_to_high') {
                $orderByField = 'price';
                $orderByValue = 'asc';
            }
        } else {
            $orderByField = 'price';
            $orderByValue = 'desc';
        }

        if($request->input('limit') != '') {
            if($request->input('limit') == '12') {
                $limit = 12;
            } elseif($request->input('limit') == '24') {
                $limit = 24;
            } elseif($request->input('limit') == '48') {
                $limit = 48;
            } elseif($request->input('limit') == '96') {
                $limit = 96;
            }
        } else {
            $limit = 12;
        }





        $boats = Boat::select(
            'boats.*',
            'types.name as type_name',
            'cities.name as city_name',
            'countries.name as country_name'
        )
            ->join('types', 'boats.type_id', '=', 'types.id')
            ->join('cities', 'boats.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->where($filter_queries_array)
            ->where('is_approved', 1)
            ->orderBy($orderByField, $orderByValue)
            ->take($limit)
            ->get()->translate($language);

        return view('catalog', compact('boats'));
    }

    public function search($language, Request $request) {
        $query = $request->input('query');
        $boats = Boat::select(
            'boats.*',
            'types.name as type_name',
            'cities.name as city_name',
            'countries.name as country_name'
        )
            ->join('types', 'boats.type_id', '=', 'types.id')
            ->join('cities', 'boats.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->where('boats.name', 'like', "%$query%")
            ->where('is_approved', 1)
            ->get()->translate($language);

        return view('catalog-searchresults', compact('boats'));
    }

    public function type($language, $slug) {
        $boats = Boat::select(
            'boats.*',
            'types.name as type_name',
            'cities.name as city_name',
            'countries.name as country_name'
        )
            ->join('types', 'boats.type_id', '=', 'types.id')
            ->join('cities', 'boats.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->where('types.slug', $slug)
            ->where('is_approved', 1)
            ->get()->translate($language);

        $type = $slug;

        return view('catalog', compact('boats', 'type'));
    }

    public function city($language, $slug) {
        $boats = Boat::select(
            'boats.*',
            'types.name as type_name',
            'cities.name as city_name',
            'countries.name as country_name'
        )
            ->join('types', 'boats.type_id', '=', 'types.id')
            ->join('cities', 'boats.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->where('cities.slug', $slug)
            ->where('is_approved', 1)
            ->get()->translate($language);

        return view('catalog', compact('boats'));
    }

    public function boat($language, $slug) {
        $boat = Boat::select(
            'boats.*',
            'types.name as type_name',
            'cities.name as city_name',
            'countries.name as country_name'
        )
            ->join('types', 'boats.type_id', '=', 'types.id')
            ->join('cities', 'boats.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->where('boats.slug', '=', $slug)
            ->firstOrFail()->translate($language);

        $owner = User::select(
            'users.*'
        )
            ->where('id', '=', $boat->owner_id)
            ->firstOrFail();

        $reviews = Review::select(
            'reviews.*',
            'boats.name as boat_name',
            'cities.name as city_name',
            'countries.name as country_name',
            'users.name as user_name',
            'users.role_id as user_role_id',
            'users.avatar as user_avatar'
        )
            ->join('boats', 'reviews.boat_id', '=', 'boats.id')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->join('cities', 'boats.city_id', '=', 'cities.id')
            ->join('countries', 'cities.country_id', '=', 'countries.id')
            ->get();
        return view('product', compact('boat', 'reviews', 'owner'));
    }

    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'addboat_name' => 'required|min:2',
            'addboat_description' => 'required|min:2',
            'addboat_mainpic' => 'required|mimes:jpeg,jpg,png,gif|max:5000',
//            'addboat_thumbnail1' => 'required|mimes:jpeg,jpg,png|max:5000',
//            'addboat_thumbnail2' => 'required|mimes:jpeg,jpg,png|max:5000',
//            'addboat_thumbnail3' => 'required|mimes:jpeg,jpg,png|max:5000',
            'addboat_country' => 'required|min:2',
            'addboat_city' => 'required|min:2',
            'addboat_type' => 'required',
            'addboat_year' => 'required|integer',
            'addboat_size' => 'required|min:1|integer',
            'addboat_guests_qty' => 'required|min:1|integer',
            'addboat_bedrooms_qty' => 'required|min:1|integer',
            'addboat_sleepers_qty' => 'required|min:1|integer',
            'addboat_showers_qty' => 'required|min:1|integer',
            'addboat_owner_avatar' => 'required|mimes:jpeg,jpg,png,gif|max:5000',
            'addboat_owner_name' => 'required|min:2',
            'addboat_owner_last_name' => 'required|min:2',
            'addboat_owner_email' => 'required|min:2|email',
            'addboat_owner_phone' => 'required|min:2',
        ]);

        $mainpic = $request->file('addboat_mainpic');
        if ($mainpic) { $mainpic_path = $mainpic->store('catalog', 'public'); }

        $thumbnail1 = $request->file('addboat_thumbnail1');
        if ($thumbnail1) { $thumbnail1_path = $thumbnail1->store('catalog', 'public'); }

        $thumbnail2 = $request->file('addboat_thumbnail2');
        if ($thumbnail2) { $thumbnail2_path = $thumbnail2->store('catalog', 'public'); }

        $thumbnail3 = $request->file('addboat_thumbnail3');
        if ($thumbnail3) { $thumbnail3_path = $thumbnail3->store('catalog', 'public'); }

        $documents = $request->file('addboat_documents');
        if ($documents) { $documents_path = $documents->store('catalog', 'public'); }

        $owner_avatar = $request->file('addboat_owner_avatar');
        if ($owner_avatar) { $owner_avatar_path = $owner_avatar->store('catalog', 'public'); }







        $country = Country::create([
            'name' => $request->addboat_country
        ]);

        $city = City::create([
            'name' => $request->addboat_city,
            'slug' => $request->addboat_city_slug,
            'country_id' => $country->id
        ]);

        $user = User::create([
            'name' => $request->addboat_owner_name,
            'last_name' => $request->addboat_owner_last_name,
            'email' => $request->addboat_owner_email,
            'phone' => $request->addboat_owner_phone,
            //'avatar' => basename($owner_avatar_path),
            'role_id' => 3,
            'password' => '0',
        ]);

        $product = Boat::create([
            'name' => $request->addboat_name,
            'slug' => $request->addboat_slug,
            'description' => $request->addboat_description,
            'mainpic' => basename($mainpic_path),
            'thumbnail1' => 'test',
            'thumbnail2' => 'test',
            'thumbnail3' => 'test',
            'city_id' => $city->id,
            'type_id' => $request->addboat_type,
            'year' => $request->addboat_year,
            'size' => $request->addboat_size,
            'guests_qty' => $request->addboat_guests_qty,
            'bedrooms_qty' => $request->addboat_bedrooms_qty,
            'sleepers_qty' => $request->addboat_sleepers_qty,
            'showers_qty' => $request->addboat_showers_qty,
            'with_capitan' => 1,
            'instant_confirmation' => 1,
            'fuel_included' => 1,
            'additionally_included' => 'test',
            'documents' => 'test',
            'owner_id' => $user->id,
            'price' => 0,
            'saleprice' => 0,
            'is_approved' => 0,
        ]);

        \Session::flash('message', 'Лодка была успешно добавлена');

        return redirect()
            ->route('mainpage.index', ['product' => $product->id])
            ->with('success', 'Новый товар успешно создан');
    }

}
