<?php

namespace App\Http\Controllers;

use App\Http\Classes\Test;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use PharIo\Manifest\License;

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
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function test()
    {
        return view('test');
    }


}
