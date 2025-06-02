<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Support\Str;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index(Request $request)
{
    $query = Order::query()->latest();

    if ($request->has('filter') && in_array($request->filter, ['baju', 'kain_besar', 'sepatu', 'lainnya'])) {
        $query->where('item_type', $request->filter);
    }

    $orders = $query->paginate(10);

    return view('admin.orders.index', compact('orders'));
}


    public function create()
    {
        $services = Service::all();
        return view('admin.orders.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'service_id' => 'required|exists:services,id',
            'weight' => 'required|numeric|min:0.1',
            'item_type' => 'required|in:baju,kain_besar,sepatu,lainnya',
            'note' => 'nullable|string',
        ]);

        $service = Service::findOrFail($request->service_id);
        $totalPrice = $service->price_per_kg * $request->weight;

        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'service_id' => $request->service_id,
            'weight' => $request->weight,
            'status' => 'menunggu',
            'item_type' => $request->item_type,
            'note' => $request->note,
            'transaction_time' => Carbon::now(),
            'order_code' => 'LDY-' . strtoupper(Str::random(8)),
            'price' => $totalPrice,
        ]);

        return redirect()->route('admin.orders.show', $order->id)->with('success', 'Order berhasil dibuat.');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $services = \App\Models\Service::all();
        return view('admin.orders.edit', compact('order', 'services'));
    }

 public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);

    $request->validate([
        'status' => 'required|in:menunggu,diproses,selesai,diambil',
    ]);

    $order->status = $request->status;

    $order->save();

    return redirect()->route('admin.orders.show', $order->id)
                     ->with('success', 'Order berhasil diperbarui.');
}


    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dihapus.');
    }

    

}
