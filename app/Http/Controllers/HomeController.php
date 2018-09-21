<?php

namespace sgp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->tipo=='admin'){
            return view('home');
        }else{
            if (Auth::user()->tipo=='gerente') {
                return view('homegerente');
            }
            if (Auth::user()->tipo=='caja') {
                return view('homecaja');
            }
            else{
                $this->guard()->logout();
            }
        }
    }
}
