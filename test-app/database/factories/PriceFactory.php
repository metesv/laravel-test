<?php

// database/factories/PriceFactory.php

namespace Database\Factories;

use App\Models\Price;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceFactory extends Factory
{
    protected $model = Price::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'currency_code' => $this->faker->randomElement(['USD', 'CAD']),
            'price' => $this->faker->numberBetween(10, 100),
        ];
    }
}
