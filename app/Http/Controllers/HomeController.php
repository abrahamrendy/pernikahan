<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

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

    // public function setRoles() {
    //     if(!\Session::has('roles')) {
    //         $roles = Auth::user()->roles;
    //         \Session::put('roles', $roles);
    //     }
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $this->setRoles();
        $data = DB::select('SELECT status, COUNT(*) as ct FROM pemberkatan GROUP BY status');
        return view('home', ['data' => $data]);
    }

    public function logout()
    {
        Auth::logout();
        return back();
    }
}
