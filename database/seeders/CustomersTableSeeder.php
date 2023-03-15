<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'name' => 'test',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
        $userCreated = User::create($user);
        $customers = [
            [
                'first_name' => 'Jan',
                'last_name' => 'Kowalski',
                'phone_number' => '425-661-6646',
                'user_id' => $userCreated->id
            ],
            [
                'first_name' => 'Adam',
                'last_name' => 'Nowak',
                'phone_number' => '425-661-1234',
                'user_id' => $userCreated->id
            ]
        ];
        foreach($customers as $key => $value)
        {
            Customer::create($value);
        }
    }
}
