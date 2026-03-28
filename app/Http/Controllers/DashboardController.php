<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Costumer;
use App\Models\Order;
use App\Models\Evidence;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics.
     */
    public function index()
    {
        $totalCostumers = Costumer::count();
        $totalOrders = Order::count();
        $totalEvidences = Evidence::count();
        $totalUsers = User::count();
        
        $ordersByStatus = [
            'ordered' => Order::where('status', 'ordered')->count(),
            'in_process' => Order::where('status', 'in_process')->count(),
            'in_route' => Order::where('status', 'in_route')->count(),
            'delivered' => Order::where('status', 'delivered')->count(),
        ];
        
        $recentOrders = Order::latest()->take(5)->get();

        return view('dashboard', compact(
            'totalCostumers',
            'totalOrders',
            'totalEvidences',
            'totalUsers',
            'ordersByStatus',
            'recentOrders'
        ));
    }
}