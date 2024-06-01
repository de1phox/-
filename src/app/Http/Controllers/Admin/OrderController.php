<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 1)->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }
}
