<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class PendetaController extends Controller
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
        $pendeta = DB::table('pendeta')->get();
        
        return view('pendeta', ['data' => $pendeta]);
    }

    public function getPendeta($id) {
        $pendeta = DB::table('pendeta')->where('id', $id)->get();

        return json_encode($pendeta);
    }

    public function submitEditPendeta(Request $request){
        $id = strip_tags($request->input('id'));
        $nama = strip_tags($request->input('edit_nama'));

        try {
            $affected = DB::table('pendeta')->where('id', $id)->update([
                                                                            'nama_pendeta' => $nama,
                                                                            'updated_at' => date("Y-m-d H:i:s")
                                                                        ]);
        } catch (\Illuminate\Database\QueryException $e) {
            // Do whatever you need if the query failed to execute
            dd($e);
        }

        \Session::flash('success', 'Edit success!');

        return back();
    }
}