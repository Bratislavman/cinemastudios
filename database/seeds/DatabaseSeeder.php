<?php

use Illuminate\Database\Seeder;
use App\Services\UserService;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CountrySeeder::class);
        UserService::createUser(
            'admin@gmail.ru',
             '7XDooMX2',
            'Admin'
        );
        UserService::createUser(
            'user@gmail.ru',
            '7XDooMX3',
            'User'
        );
    }
}
