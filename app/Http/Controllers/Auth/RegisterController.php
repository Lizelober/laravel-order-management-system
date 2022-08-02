<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest');
    }

    public function index() {
        $user = DB::table('users')
        ->join('currency_countries', 'users.currency_countries_id', '=', 'currency_countries.id')
        ->select('users.name', 'users.surname', 'users.email', 'currency_countries.country_name', 'currency_countries.currency_name')
        ->get();

        return view('auth.index', compact('users'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'currency_countries_id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data) {
        
        $user = DB::table('users')
        ->join('currency_countries', 'users.currency_countries_id', '=', 'currency_countries.id')
        ->select('users.name', 'users.surname', 'users.email', 'currency_countries.country_name')
        ->get();

        $currency_countries = DB::table('currency_countries')->get();
        foreach ($currency_countries as $country) {
            $country->currency_name;
            $country->country_name;
        }
        
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'currency_countries_id' => $data['currency_countries_id'],
            'password' => Hash::make($data['password']),
        ]);

        
        Session::push('user', [
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'currency_countries_id' => $data['currency_countries_id'],
        ]);

        return $user;
        //return view('auth.login', compact('user', 'currency_countries'));
    }
    public function show($id = null) {
        return "User " . $id;
    }

    // public function show(Request $request, $id) {
    //     $value = $request->session()->get('key');

    //     //
    // }
}
