<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\Plant;
use Illuminate\Http\Request;
use App\Services\CurrencyConversion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BasketController extends Controller
{
    public function basket()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)){
            $order = Order::findOrFail($orderId);
        }
        else $order = array();
        return view('frontend/basket', compact('order'));
    }

    public function basketConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone, $request->address, $request->email, Auth::user()->id);
        if ($success) {
            session()->flash('success', 'Ваш заказ принят в обработку!');
        } else {
            session()->flash('warning', 'Случилась ошибка');
        }
        return redirect()->route('index');
    }

    public function basketPlace()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('frontend/order', compact('order'));
    }

    public function basketAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($productId)) {
            $product = $order->products()->where('plant_id', $productId)->first();
            $pivotRow = $product->pivot;
            if ($pivotRow->plant_count < $product->quantity)
            {
                $pivotRow->plant_count++;
                $pivotRow->update();
            } else
                session()->flash('warning', 'Невозможно добавить новый товар, так как на складе нет такого
                количества данного товара');
        } else {
            $order->products()->attach($productId);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Plant::find($productId);

        return redirect()->back()->with('success', 'Товар ' .$product->name.' был добавлен в корзину');
    }

    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('plant_id', $productId)->first()->pivot;
            if ($pivotRow->plant_count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->plant_count--;
                $pivotRow->update();
            }
        }

        $product = Plant::find($productId);


        session()->flash('warning', 'Удален товар  ' . $product->name);

        return redirect()->route('basket');
    }
}
