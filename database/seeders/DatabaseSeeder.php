<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::updateOrCreate(
            [ 'email' => 'admin@example.com'],
            [
            'first_name' => 'admin',
            'middle_name' => 'user',
            'last_name' => 'admin',
            'address' => 'Sta. Magdalena, Sorsogon',
            'password' => Hash::make ('password'),
        ]);

        $this->call([
            ProductSeeder::class,
            SaleSeeder::class,
        ]);
    }
}
