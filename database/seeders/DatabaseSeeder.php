<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate([
            'first_name' => 'admin',
            'middle_name' => 'user',
            'last_name' => 'admin',
            'email' => 'admin@example.com',
            'address' => 'Sta. Magdalena, Sorsogon',
            'password' => Hash::make ('password'),
        ]);
        $this->call(ProductSeeder::class);
    }
}
