<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardConroller extends Controller
{
    public function dashboard(Request $request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $last7Days = [];

        if ($end_date) {
            $endDate = Carbon::parse($end_date);
        } else {
            $endDate = Carbon::now();
            $endDate = $endDate->addDay();
        }


        if ($start_date) {
            $startDate = Carbon::parse($start_date);
        } else {
            $startDate = Carbon::now()->subDays(6);
        }

        // Use CarbonPeriod to generate the date range
        $period = CarbonPeriod::create($startDate, $endDate); // Add a day to include the end date

        foreach ($period as $date) {
            $last7Days[] = $date->toDateString();
        }

        // Get customer count based on the date range
        $customers = Role::where('name', 'user')->first()->users->whereBetween('created_at', [$startDate, $endDate]);

        // total orders
        $totalOrders = Order::whereBetween('created_at', [$startDate, $endDate])->get();
        // pending orders
        $pendingOrders = Order::where('order_status', 'pending')->whereBetween('created_at', [$startDate, $endDate])->get();
        // processing orders
        $processingOrders = Order::where('order_status', 'processing')->whereBetween('created_at', [$startDate, $endDate])->get();
        // completed orders
        $completedOrders = Order::where('order_status', 'completed')->whereBetween('created_at', [$startDate, $endDate])->get();

        // Create an array to store the orders counts for the last 7 days
        $ordersStats = [];

        foreach ($last7Days as $day) {

            // pending orders
            $Pending_Orders = Order::where('order_status', 'pending')->whereDate('created_at', $day)->get();
            // processing orders
            $Processing_Orders = Order::where('order_status', 'processing')->whereDate('created_at', $day)->get();
            // completed orders
            $Completed_Orders = Order::where('order_status', 'completed')->whereDate('created_at', $day)->get();

            // Calculate the total sending amount
            $Pending_Orders_Value = $Pending_Orders->sum('total_amount');
            $Processing_Orders_Value = $Processing_Orders->sum('total_amount');
            $Completed_Orders_Value = $Completed_Orders->sum('total_amount');

            // $Pending_Orders_Count = $Pending_Orders->count();
            // $Processing_Orders_Count = $Processing_Orders->count();
            // $Completed_Orders_Count = $Completed_Orders->count();

            $ordersStats[] = [
                'day'                   => $day,
                'pendingOrdersValue'    => $Pending_Orders_Value,
                'processingOrdersValue' => $Processing_Orders_Value,
                'completedOrdersValue'  => $Completed_Orders_Value,
                // 'pendingOrdersCount'    => $Pending_Orders_Count,
                // 'processingOrdersCount' => $Processing_Orders_Count,
                // 'completedOrdersCount'  => $Completed_Orders_Count,
            ];
        }

        return view('pages.dashboard', compact('customers', 'totalOrders', 'pendingOrders', 'processingOrders', 'completedOrders', 'ordersStats', 'ordersStats', 'last7Days'));
    }
}
