<?php

namespace App\Http\Controllers;

use App\Models\CurrencyCountry;
use App\Models\User;
use Illuminate\Http\Request;

class CurrencyCountryController extends Controller
{
    public function index() {
        // Kry een user id. Die users table bevat al die velde (asook currency_country_id) //
        // $users = CurrencyCountry::find(1)->users; //Die find(1) beteken hy run eerste
        // dd($users);

        // // Kry een currency_country id. Die currency_countries table bevat al die velde (asook currency_countries.id gelink met users.id) //
        // $currency_country = User::find(2)->currency_country; //Die find(2) beteken hy run tweede
        // dd($currency_country);

        // Return al die users in die users table met hul currency_country_id //
        // $user = User::find(1);
        // $currency_country = CurrencyCountry::find(2);
        // $a = $user->currency_country()->associate($currency_country)->get();
        // dd($a);
        $currency_countries = CurrencyCountry::latest()->paginate(5);
        return view('currency_countries.index', compact('currency_countries'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('currency_countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'currency_name' => 'required',
            'country_name' => 'required',
        ]);

        CurrencyCountry::create($request->all());

        return redirect()->route('currency_countries.index')
            ->with('success', 'CurrencyCountry created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurrencyCountry  $currency_country
     * @return \Illuminate\Http\Response
     */
    public function show(CurrencyCountry $currency_country) {
        return view('currency_countries.show', compact('currency_country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrencyCountry  $currency_country
     * @return \Illuminate\Http\Response
     */
    public function edit(CurrencyCountry $currency_country) {
        return view('currency_countries.edit', compact('currency_country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CurrencyCountry  $currency_country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CurrencyCountry $currency_country) {
        $request->validate([
            'currency_name' => 'required',
            'country_name' => 'required',
        ]);

        $currency_country->update($request->all());

        return redirect()->route('currency_countries.index')
            ->with('success', 'CurrencyCountry updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrencyCountry  $currency_country
     * @return \Illuminate\Http\Response
     */
    public function destroy(CurrencyCountry $currency_country) {
        $currency_country->delete();

        return redirect()->route('currency_countries.index')
            ->with('success', 'CurrencyCountry deleted successfully');
    }
}
