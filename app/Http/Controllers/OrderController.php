<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //To Display orders om homepage:
    //public function homepage() {
    //Route::get('index', 'AvoHomeController@homepage');

    public function index() {
        $name = auth()->user()->name;
        $surname = auth()->user()->surname;

        $orders = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('currency_countries', 'currency_countries.id', '=', 'users.currency_country_id')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.id', 'users.name', 'users.surname', 'products.product_name', 'currency_countries.currency_sign', 'orders.order_price', 'orders.quantity', 'orders.order_paid_date')
            ->orderBy('orders.created_at', 'desc')
            ->paginate(5);
        
        return view('orders.index', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order) {
        $name = auth()->user()->name;
        $surname = auth()->user()->surname;

        $orders = DB::table('orders')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('currency_countries', 'currency_countries.id', '=', 'users.currency_country_id')
        ->join('products', 'orders.product_id', '=', 'products.id')
        ->select('orders.id', 'products.id', 'products.image', 'users.name', 'users.surname', 'products.product_name', 'currency_countries.currency_sign', 'orders.order_price', 'orders.quantity', 'orders.order_paid_date')
        ->where('orders.id', '=', $order->id)
        ->get();

        return view('orders.show', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order) {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'order_paid_date' => 'required',
        ]);
        $order = Order::find($id);
        $order->order_paid_date = $request->order_paid_date;
        $order->save();
        return redirect()->route('orders.index')
        ->with('success', 'Order Has Been updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order) {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully');
    }
}
