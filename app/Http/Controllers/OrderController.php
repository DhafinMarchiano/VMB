<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::all();
        return view('admin.pengiriman.index', compact('orders'));
    }

    public function create() {
        $customers = Customer::all();
        $cities = json_decode(file_get_contents(public_path('json/city.json')));
        // dd($cities[0]->provinsi);
        return view('admin.pengiriman.create', compact('customers', 'cities'));
    }

    public function store(Request $request) {
        // Validate request
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date|after:today',
            'start' => 'required|string|max:255|different:end',
            'end' => 'required|string|max:255|different:start',
            'total_weight' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Create order
        Order::create([
            'customer_id' => $request->input('customer_id'),
            'order_date' => $request->input('order_date'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'total_weight' => $request->input('total_weight'),
            'total_price' => $request->input('total_price'),
        ]);

        // Redirect to order detail
        return redirect()->route('admin.pengiriman')->with('success', 'Pesanan berhasil ditambahkan');
    }

    public function edit($id) {
        $order = Order::find($id);
        $customers = Customer::all();
        return view('admin.pengiriman.edit', compact('order', 'customers'));
    }

    public function update(Request $request, $id) {
        // Validate request
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date|after:today',
            'start' => 'required|string|max:255|different:end',
            'end' => 'required|string|max:255|different:start',
            'total_weight' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|string|max:255',
        ]);

        // Update order
        Order::find($id)->update([
            'customer_id' => $request->input('customer_id'),
            'order_date' => $request->input('order_date'),
            'start' => $request->input('start'),
            'end' => $request->input('end'),
            'total_weight' => $request->input('total_weight'),
            'total_price' => $request->input('total_price'),
            'status' => $request->input('status'),
        ]);

        // Redirect to order detail
        return redirect()->route('admin.pengiriman')->with('success', 'Pesanan berhasil diubah');
    }

    public function delete($id) {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('admin.pengiriman')->with('success', 'Pesanan berhasil dihapus');
    }

    public function customer() {
        $orders = Order::where('customer_id', '=', Auth::guard('customer')->user()->id)
            ->Orderby('order_date', 'desc')
            ->get();
        return view('client.order', compact('orders'));
    }
}