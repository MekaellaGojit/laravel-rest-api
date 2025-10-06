<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Product;

class SaleSeeder extends Seeder
{

    public function run(): void
    {
        $product = Product::first();

        if ($product) {
            Sale::create([
                'product_id' => $product->id,
                'quantity' => 2,
                'amount' => (float) $product->price * 2,
            ]);
        } else {
            $this->command->info('No Products Found');
        }

    }
}
