<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $now = Carbon::now();

        $totalIncome = Order::whereMonth('transaction_time', $now->month)
                        ->sum('price');

        $totalOrders = Order::whereMonth('transaction_time', $now->month)
                        ->count();

        $processingOrders = Order::where('status', 'diproses')
                        ->whereMonth('transaction_time', $now->month)
                        ->count();

        $doneOrders = Order::where('status', 'selesai')
                        ->whereMonth('transaction_time', $now->month)
                        ->count();

        $collectedOrders = Order::where('status', 'diambil')
                        ->whereMonth('transaction_time', $now->month)
                        ->count();

        $latestOrders = Order::where('status', '!=', 'diambil')
                    ->latest()
                    ->limit(6)
                    ->get();

        return view('admin.dashboard', compact(
            'totalIncome', 
            'totalOrders', 
            'processingOrders', 
            'doneOrders', 
            'collectedOrders', 
            'latestOrders'
        ));
    }
}
