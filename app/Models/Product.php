<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name_product',
        'price_product',
        'count',
        'image_id'
    ];


    public static function allReal(){
        return Product::where('count', '>', 0)->latest();
    }


    public function imageProducts()
    {
        return $this->hasMany(Image::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class, 'characteristic_product');
    }

    public function priceInRub(): Attribute
    {
        return Attribute::make(
            get: fn() => number_format(num: $this->price_product, thousands_separator: ' '),
        );
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->name_product . ' - ' .
                implode(', ', $this->characteristics->pluck('value_show')->toArray()),
        );
    }


}
