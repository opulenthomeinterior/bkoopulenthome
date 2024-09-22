<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index() {
        $orders = Order::all();
        return view('pages.orders.index', compact('orders'));
    }

    public function show($id) {
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
        }
        return view('pages.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id) {
        $order = Order::find($id);
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }
    
        $status = $request->input('order_status');

        if ($status != 'completed' && $status != 'pending' && $status != 'processing') {
            return redirect()->back()->with('error', 'Invalid order status');
        }
    
        $order->order_status = $status;
        $order->save();
    
        return redirect()->route('orders.index')->with('success', 'Order status updated successfully');
    }
    
}