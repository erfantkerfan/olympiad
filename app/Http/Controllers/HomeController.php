<?php

namespace App\Http\Controllers;

use App\Applicant;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $applicants = Applicant::all();
        return view('home')->with(compact('applicants'));
    }

    public function welcome()
    {
        return view('welcome');
    }
}
