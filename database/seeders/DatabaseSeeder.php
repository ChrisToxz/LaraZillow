<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Chris',
            'email' => 'test@example.com',
            'password' => 'password',
            'is_admin' => true
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Chris2',
            'email' => 'test2@example.com',
            'password' => 'password'
        ]);

        Listing::factory(10)->create([
            'user_id' => 1
        ]);
        Listing::factory(10)->create([
            'user_id' => 2
        ]);
    }
}
