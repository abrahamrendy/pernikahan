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
        $cabang = DB::table('cabang')->get();
        
        return view('pendeta', ['data' => $pendeta, 'cabang' => $cabang]);
    }

    public function getPendeta($id) {
        $pendeta = DB::table('pendeta')->where('id', $id)->get();

        return json_encode($pendeta);
    }

    public function submitEditPendeta(Request $request){
        $id = strip_tags($request->input('id'));
        $nama = strip_tags($request->input('edit_nama'));
        $cabang = strip_tags($request->input('edit_cabang'));

        try {
            $affected = DB::table('pendeta')->where('id', $id)->update([
                                                                            'nama_pendeta' => $nama,
                                                                            'cabang' => $cabang,
                                                                            'updated_at' => date("Y-m-d H:i:s")
                                                                        ]);
        } catch (\Illuminate\Database\QueryException $e) {
            // Do whatever you need if the query failed to execute
            dd($e);
        }

        \Session::flash('success', 'Edit success!');

        return back();
    }

    public function submitAddPendeta(Request $request){
        $nama = strip_tags($request->input('add_nama'));
        $cabang = strip_tags($request->input('add_cabang'));

        try {
            $id  = DB::table('pendeta')->insertGetId([
                                                        'nama_pendeta' => $nama,
                                                        'cabang' => $cabang,
                                                        'created_at' => date("Y-m-d H:i:s")
                                                    ]);

            if ($id) {
                \Session::flash('success', 'Add success!');
            } else {
                \Session::flash('fail', 'Add fail!');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            // Do whatever you need if the query failed to execute
            dd($e);
        }
        

        return back();
    }

    public function delPendeta(Request $request){
        $id = strip_tags($request->input('id'));

        try {
            $affected = DB::table('pendeta')->where('id', $id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            // Do whatever you need if the query failed to execute
            dd($e);
        }

        return json_encode(1);
    }
}