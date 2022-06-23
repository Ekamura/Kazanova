<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    protected $fillable=[
      'user_id',
        'product_id',
        'count'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public static function basketOrder()
    {
        return auth()->user()->baskets();
    }

    protected function priceInRub(): Attribute
    {
        return Attribute::make(
            get: fn() => number_format(num: $this->product->price_product * $this->count, thousands_separator: ' '),
        );
    }
}
