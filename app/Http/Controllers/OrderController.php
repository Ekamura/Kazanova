<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all()->sortByDesc('created_at');

        $statuses = Status::all();
        return view('orders.index', compact('orders', 'statuses'));
    }

    public function create(PasswordRequest $request)
    {
        $basket = Basket::basketOrder()->where('count', '<>', 0)->get();
        if (count($basket) > 0) {
            $order = auth()->user()->orders()->create();
            $order->orderProducts()->createMany($basket->toArray());
            foreach ($basket as $item) {
                $product = Product::find($item->product_id);
                $product->update(['count' => $product->count - $item->count]);
            }
            Basket::basketOrder()->delete();

            return redirect()->route('profile');
        }
        return redirect()->route('home');
    }


    public function sort(Request $request)
    {
        $statuses = Status::all();
        if (isset($request->status)) {
            $orders = Order::all()->where('status_id', $request->status);
        }
        return view('orders.index', compact('orders', 'statuses'));
    }


    public function show(Order $order)
    {
        $statuses = Status::all();
        return view('orders.show', compact('order', 'statuses'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update([
            'status_id' => $request->get('status'),
            'reason' => $request->get('status') === '3' ? $request->get('reason') : null,
        ]);

        return redirect()->route('admin.orders.index', $order)
            ->with('success', 'Состояние заявки изменено...');
    }


    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('profile');
    }
}
