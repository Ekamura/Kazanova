<?php

namespace App\Http\Controllers;

use App\Http\Resources\BasketResource;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $productBasket = auth()->user()->baskets()->get();
        return view('basket.index', compact('productBasket'));
    }

    public function basketPlus(Request $request)
    {
        //находим продукт
        $product = Product::find($request->data);
        //находим анлогичный продукт в корзине у авторизованного пользователя
        $productBasket = auth()->user()->baskets()->where('product_id', $request->data)->first();

        //если продукт не был заказан
        if ($productBasket === null) {
            //создаем
            $productBasket = auth()->user()->baskets()->create(['product_id' => $request->data, 'count' => 1]);
        } else {
            //если заказываемое количество не превышает того, что на складе
            if ($product->count >= $productBasket->count + 1) {
                //увеличиваем число заказанного товара
                $productBasket->count++;
                $productBasket->save();
            }
        }
        return new BasketResource($productBasket);
    }

    public function basketMinus(Request $request)
    {
        //находим продукт
        $product = Product::find($request->data);
        //находим анлогичный продукт в корзине у авторизованного пользователя
        $productBasket = auth()->user()->baskets()->where('product_id', $request->data)->first();

        if ($productBasket->count > 0) {
            //увеличиваем число заказанного товара
            $productBasket->count--;
            $productBasket->save();
        }
        return new BasketResource($productBasket);
    }

}
