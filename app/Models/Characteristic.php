<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Characteristic extends Model
{
    use HasFactory;


    protected $fillable =
        [
            'specifications_id',
            'value'
        ];

    public function specification()
    {
        return $this->belongsTo(Specification::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function valueShow(): Attribute
    {
        return Attribute::make(
            get: fn() => mb_strtolower($this->value)
        );
    }
}
