<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {

    public function index() {
        $user = auth()->user();
        //print_r($user);
        $cartItems = session()->get('cartItems', []);
        // print_r($cartItems);


        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('currency_countries', 'currency_countries.id', '=', 'users.currency_countries_id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('users.name', 'users.surname', 'orders.user_id', 'currency_countries.currency_sign', 'products.product_name', 'orders.order_price', 'orders.quantity', 'orders.order_paid_date')
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function create(Request $request, Order $order) {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('users.name', 'users.surname', 'orders.user_id',  'orders.product_id', 'products.product_price_rand', 'orders.order_price', 'orders.quantity', 'orders.order_paid_date')
            ->orderBy('orders.created_at', 'desc')
            ->get();


        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $user->id;
            $user->name;
        }

        $products = DB::table('products')->get();
        foreach ($products as $product) {
            $product->id;
            $product->product_name;
        }

        return view('orders.create', compact('orders', 'users', 'products'));
    }

    public function store(Request $request, Order $order) {
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'product_name' => 'required',
            'order_price' => 'required',
            'quantity' => 'required',
            'order_paid_date' => ''
        ]);

        $order->create($request->all());

        // Order::create($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    public function show(Order $order) {
        return view('orders.index');
    }


    public function edit(Order $order) {
        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('currency_countries', 'currency_countries.id', '=', 'users.currency_countries_id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('users.name', 'users.surname', 'orders.user_id', 'currency_countries.currency_sign', 'products.product_name', 'orders.order_price', 'orders.quantity', 'orders.order_paid_date')
            ->where('orders.user_id', '=', Auth::user()->id)
            ->get();

        // echo "<pre>";
        // print_r($orders);
        // echo "</pre>";

        // $users = DB::table('users')->get();
        // foreach ($users as $user) {
        //     $user->id;
        //     $user->name;
        // }

        // $products = DB::table('products')->get();
        // foreach ($products as $product) {
        //     $product->id;
        //     $product->product_name;
        // }
        
        return view('orders.edit', compact('orders'));
    }

    public function update(Request $request, Order $order) {
        
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'product_name' => 'required',
            'order_price' => 'required',
            'quantity' => 'required',
            'order_paid_date' => ''
        ]);

        $input = $request->all();
        $order->update($input);

        return redirect()->route('orders.index', ['order' => $order])
            ->with('success', 'Order updated successfully');
    }

    public function destroy(Order $order) {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
