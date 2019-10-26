<?php

namespace App\Http\Controllers;

use App\Product;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function success()
    {
        return view('success');
    }

    public function store(Request $request)
    {
        $order = Order::create($request->all());
        $products = [];
        $cart = session()->get('cart');
        foreach ($cart as $key => $value) {
            $order->products()->attach($key, [
                'order_id' => $order->id,
                'quantity' => $value['quantity']
            ]);
        }
        session()->put('cart', null);
        // $order->products()->sync($products);

        session()->flash('flash_message','Order '. $order->id.' created');
        return redirect('success');
    }

}
