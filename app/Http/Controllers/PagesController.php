<?php

namespace App\Http\Controllers;

use App\Models\SessionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller {
    public function index() {
        
        $session = SessionModel::all();

        // dd(
        //     Session::all()
        // );

        dd(
            $session
        );

        return view('index');

        // $session = SessionModel::all();
        // dd(
        //     Session::all()
        // );
        // dd(
        //     $session
        // );
        // return view('sessions');
    }

}
