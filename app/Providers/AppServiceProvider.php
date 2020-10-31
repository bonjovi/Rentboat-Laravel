<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Jenssegers\Date\Date;
use App\Review;
use App\City;
use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_ALL, 'ru_RU.utf8');
        Carbon::setLocale(config('app.locale'));

        Date::setlocale(config('app.locale'));

        $reviews = Review::all();
        view()->share('overall_reviews', $reviews);

        $posts = Post::all();
        view()->share('overall_posts', $posts);

        $cities = City::all();
        view()->share('overall_cities', $cities);

        $currency = 'RUB';

        if(isset($_GET['currency'])) {
            if($_GET['currency'] == 'RUB') {
                $currency = 'RUB';
            } elseif($_GET['currency'] == 'USD') {
                $currency = 'USD';
            } elseif($_GET['currency'] == 'EUR') {
                $currency = 'EUR';
            }
        } else {
            $currency = 'RUB';
        }
        view()->share('currency', $currency);
    }
}
