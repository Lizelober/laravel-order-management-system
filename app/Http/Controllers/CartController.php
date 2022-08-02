<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {
    public function index() {
        $carts = Cart::all();

        $cartItems = session()->get('cartItems', []);
        $user_id = Auth::user()->id;
        return view('carts.index', compact('carts'));
    }

    public function addToCart($id) {
        $product = Product::findorFail($id);
        $cartItems = session()->get('cartItems', []);

        $user_exchange_rate = DB::table('currency_countries')
            ->join('users', 'users.currency_country_id', '=', 'currency_countries.id')
            ->select('currency_countries.exchange_rate', 'currency_countries.currency_sign')
            ->where('users.id', Auth::user()->id)
            ->get();

        foreach ($user_exchange_rate as $item) {
            $exchange_rate = $item->exchange_rate;
            $currency_sign = $item->currency_sign;
        }

        if (isset($cartItems[$id])) {
            $cartItems[$id]['quantity']++;
        } else {
            $cartItems[$id] = [
                'image' => $product->image,
                'product_name'  => $product->product_name,
                'Price'  => $product->product_price_rand,
                'quantity'  => 1,
                'exchange_rate' => $item->exchange_rate,
                'currency_sign' => $item->currency_sign
            ];
        }
        session()->put('exchange_rate', $cartItems);
        session()->put('currency_sign', $cartItems);
        session()->put('cartItems', $cartItems);

        // redirect to the same page
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function checkout(Request $request, $id) {
        if ($request->id) {
            $cartItems = session()->get('cartItems', []);

            foreach ($cartItems as $id => $values) {
                $product_name = $values['product_name'];
                $product_price_rand = $values['Price'];
                $quantity = $values['quantity'];
                $exchange_rate = $values['exchange_rate'];
                $order_price = $exchange_rate * $product_price_rand * $quantity;

                $new = new Order();
                $new->user_id = Auth::user()->id;
                $new->product_id = $id;
                $new->quantity = $quantity;
                $new->order_price = $order_price;
                $new->save();
            }
            
            session()->forget('cartItems');
            return redirect()->route('orders.index');
        }
    }
    public function update(Request $request) {
        if ($request->id && $request->quantity) {
            $cartItems = session()->get('cartItems');
            $cartItems[$request->id]["quantity"] = $request->quantity;
            session()->put('cartItems', $cartItems);
            // return redirect()->back()->with('success', 'Cart updated successfully');
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request) {
        if ($request->id) {
            $cartItems = session()->get('cartItems');
            if (isset($cartItems[$request->id])) {
                unset($cartItems[$request->id]);
                session()->put('cartItems', $cartItems);
                return redirect()->back()->with('success', 'Product removed successfully');
            }
        }
    }
}
