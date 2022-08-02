<?php

namespace App\Http\Controllers;

use App\Models\CurrencyCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = DB::table('users')
        ->join('currency_countries', 'users.currency_country_id', '=', 'currency_countries.id')
        ->select('users.id', 'users.name', 'users.surname', 'users.email', 'currency_countries.country_name', 'currency_countries.currency_name')
        ->paginate(5);

        return view('users.index', compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {

        $currency_countries = DB::table('currency_countries')->get();

        foreach ($currency_countries as $currency_country) {
            $currency_country->id;
            $currency_country->country_name;
            $currency_country->currency_name;
        }

        $users = DB::table('users')
        ->join('currency_countries', 'currency_countries.id', '=', 'users.currency_country_id')
        ->select('users.id', 'users.name', 'users.surname', 'users.email', 'currency_countries.country_name', 'currency_countries.currency_name')
        ->where('users.id', '=', $user->id)      
        ->get();

        foreach ($users as $user) {
            $user->id;
            $user->email;
        }

        return view('users.show', compact('user'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'currency_countries_id' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('users.index')
        ->with('success', 'User created successfully.');
    }



    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'currency_countries_id' => 'required',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')
        ->with('success', 'User updated successfully');
    }

    public function destroy(User $user) {
        $user->delete();

        return redirect()->route('users.index')
        ->with('success', 'User deleted successfully');
    }
    /* public function index(Request $request) {

        Current Login User Details
        $user = auth()->user();
        var_dump($user);

        /* Current Login User ID
        $userID = auth()->user()->id;
        var_dump($userID);

        /* Current Login User Name
        $userName = auth()->user()->name;
        var_dump($userName);

        /* Current Login User Email
        $userEmail = auth()->user()->email;
        var_dump($userEmail); */
}
