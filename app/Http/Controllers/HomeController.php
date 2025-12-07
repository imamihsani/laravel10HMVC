<?php

namespace App\Http\Controllers;

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
        // $this->middleware('auth');
        $this->middleware('auth')->except(['index', 'about', 'product', 'contact']); // -------- kecuali laman home dan seisi sub2nya

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('layouts.home.index');
    }
    public function about()
    {
        return view('layouts.home.about');
    }
    public function product()
    {
        return view('layouts.home.product');
    }
    public function contact()
    {
        return view('layouts.home.contact');
    }
}
