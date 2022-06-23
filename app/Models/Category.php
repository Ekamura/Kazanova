<?php

namespace App\Models;

use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'image'
    ];



    public static function getStoreCategory($request,$path)
    {
        Category::create([
            'category_name' => $request->get('category_name'),
            'image'=>$path
        ]);
    }
}
