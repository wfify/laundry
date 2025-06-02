<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class LandingPageController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function check()
    {
        return view('landing.check');
    }

    public function search(Request $request)
    {
        $request->validate([
            'order_code' => 'required|string'
        ]);

        $order = Order::where('order_code', $request->order_code)->first();

        if (!$order) {
            return back()->withErrors(['order_code' => 'Kode order tidak ditemukan.']);
        }

        return redirect()->route('order.detail', $order->order_code);
    }

    public function detail($order_code)
    {
        $order = Order::where('order_code', $order_code)->firstOrFail();
        return view('landing.detail', compact('order'));
    }
    public function lokasi()
    {
        return view('lokasi'); // pastikan ada file resources/views/lokasi.blade.php
    }

}
