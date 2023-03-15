<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //fake data
        User::factory(10)->create()->each(function ($user) {
           Customer::factory(20)->create(['user_id' => $user->id]);
        });

        //real data
        //$this->call(CustomersTableSeeder::class);
        
    }
}
