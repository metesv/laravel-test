<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Price;
use Illuminate\Database\Eloquent\Factories\Factory;

class InsertProductData extends Command
{
    protected $signature = 'insert:product-data';
    protected $description = 'Insert 1000 Product records with prices in USD and CAD';

    public function handle()
    {
        // Clear existing records (optional)
        Product::truncate();
        Price::truncate();

        // Use Factory to generate 1000 Product records
        Factory::factoryForModel(Product::class)->count(1000)->create();

        // Insert 2 price records for each product in USD and CAD
        Product::all()->each(function ($product) {
            $product->prices()->createMany([
                ['currency_code' => 'USD', 'price' => rand(10, 100)],
                ['currency_code' => 'CAD', 'price' => rand(10, 100)],
            ]);
        });

        $this->info('Product data inserted successfully!');
    }
}
