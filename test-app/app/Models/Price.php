<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = ['product_id', 'currency_code', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
