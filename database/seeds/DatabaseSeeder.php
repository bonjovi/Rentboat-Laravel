<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountryTableSeeder::class);
        $this->command->info('Таблица стран загружена данными!');

        $this->call(CityTableSeeder::class);
        $this->command->info('Таблица городов загружена данными!');

        $this->call(TypeTableSeeder::class);
        $this->command->info('Таблица типов лодок загружена данными!');

        $this->call(UserTableSeeder::class);
        $this->command->info('Таблица пользователей загружена данными!');

        $this->call(BoatTableSeeder::class);
        $this->command->info('Таблица лодок загружена данными!');
    }
}
