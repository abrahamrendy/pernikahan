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
        $kdrayon = Auth::user()->kdrayon;
        $cabang_asal = Auth::user()->cabang;

        if (Auth::user()->roles == 1) {
            $data = DB::select('SELECT status, COUNT(*) as ct FROM pemberkatan GROUP BY status');
        } else if (Auth::user()->roles == 2){
            $data = DB::select('SELECT status, COUNT(*) as ct FROM pemberkatan WHERE cabang_asal = ? GROUP BY status',[$cabang_asal]);
        } else if (Auth::user()->roles == 3) {
            $data = DB::select('SELECT status, COUNT(*) as ct, cabang.kdrayon FROM pemberkatan LEFT OUTER JOIN cabang ON cabang_asal = cabang.nmcabang WHERE cabang.kdrayon = ? GROUP BY status',[$kdrayon]);
        } else if (Auth::user()->roles == 5) {
            $data = DB::select('SELECT status, COUNT(*) as ct FROM pemberkatan GROUP BY status');
        }
        return view('home', ['data' => $data, 'user' => Auth::user()]);
    }

    public function logout()
    {
        Auth::logout();
        return back();
    }
}
