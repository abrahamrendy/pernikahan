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
        $cabang = Auth::user()->cabang;
        if ($cabang != null) {
            $data = DB::select('SELECT status, COUNT(*) as ct FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id WHERE calon_mempelai.tempat_ibadah = ? GROUP BY status',[$cabang]);
        } else {
            $data = DB::select('SELECT status, COUNT(*) as ct FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id GROUP BY status');
        }
        return view('home', ['data' => $data, 'user' => Auth::user()]);
    }

    public function logout()
    {
        Auth::logout();
        return back();
    }
}
