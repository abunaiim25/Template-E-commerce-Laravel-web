<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $main = Main::first();
        return view('home',compact('main'));
    }


    //add
    public function admin()
    {
        return view('admin.dashboard');
    }
}
