<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::truncate();
        Product::truncate();

        Factory::factoryForModel(Product::class)->count(1000)->create();

        Product::all()->each(function ($product) {
            $product->prices()->createMany([
                ['currency_code' => 'USD', 'price' => rand(10, 100)],
                ['currency_code' => 'CAD', 'price' => rand(10, 100)],
            ]);
        });
    }
}
