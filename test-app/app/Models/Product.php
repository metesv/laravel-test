<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku'];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public static function newFactory()
    {
        return \Database\Factories\ProductFactory::new();
    }
}
