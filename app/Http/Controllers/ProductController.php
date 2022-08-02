<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;;

class ProductController extends Controller {

    public function index() {
        $products = Product::latest()->paginate(5);

        return view('products.index', compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product) {
        return view('products.show', compact('product'));
    }

    public function shopindex() {
        $products = Product::all();

        return view('shop.index', ['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'product_name' => 'required',
            'product_price_rand' => 'required',
        ]);
        $path = $request->file('image')->store('public/images');
        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_price_rand = $request->product_price_rand;
        $product->image = $path;
        $product->save();

        return redirect()->route('products.index')
        ->with('success', 'Product has been created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product) {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $request->validate([
            'product_name' => 'required',
            'product_price_rand' => 'required',
        ]);

        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $product->image = $path;
        }
        $product->product_name = $request->product_name;
        $product->product_price_rand = $request->product_price_rand;
        $product->save();

        return redirect()->route('products.index')
        ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) {
        $product->delete();

        return redirect()->route('products.index')
        ->with('success', 'Product deleted successfully');
    }
    
}
