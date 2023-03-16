<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //roles
        $this->call(LaratrustSeeder::class);
        
        //fake data
        User::factory(10)->create()->each(function ($user) {
           Customer::factory(20)->create(['user_id' => $user->id]);
           $user->attachRole('user');
        });

        User::factory(2)->create()->each(function ($user) {
            $user->attachRole('admin');
         });

        //real data
        //$this->call(CustomersTableSeeder::class);
        
        
    }
}
