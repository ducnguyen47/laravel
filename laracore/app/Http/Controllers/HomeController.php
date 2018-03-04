<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\EventTest;
use App\Events\Event;
use Events;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('test');
        // $a = "ok";
        event(new EventTest('Ok rooif nek'));
        // dd($a->activity);
        return view('home');
    }
}
