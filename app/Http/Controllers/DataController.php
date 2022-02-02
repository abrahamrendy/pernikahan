<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
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
    public function index($type)
    {
        $data = DB::select('SELECT t.nama as nama_pria, calon_mempelai.nama as nama_wanita, t.*
                            FROM (SELECT pemberkatan.*, calon_mempelai.nama as nama FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id) as t
                            INNER JOIN calon_mempelai ON t.mempelai_wanita = calon_mempelai.id WHERE t.status_pernikahan = ?',[strtoupper($type)]);
        if (strtolower($type) == 'dd') {
            $title = "Didoakan";  
        } else if (strtolower($type) == "sp") {
            $title = "Diberkati";
        } else if (strtolower($type) == "pp") {
            $title = "Diteguhkan";
        } else {
            $title = "";
            $data = "";
        }

        
        return view('data', ['title' => $title, 'data' => $data]);
    }

    public function getMempelai($id) {
        $mempelai = DB::table('calon_mempelai')->where('id', $id)->get();

        return json_encode($mempelai);
    }

    public function getPemberkatan($id) {
        $pemberkatan = DB::table('pemberkatan')->where('id', $id)->get();

        return json_encode($pemberkatan);
    }

    public function submit(Request $request) {
        $id = strip_tags($request->input('id'));

        $affected = DB::table('pemberkatan')->where('id', $id)->update(['status' => 1]);

        return response()->json([
            'success' => '1',
        ]);
    }

    public function verify(Request $request) {
        $id = strip_tags($request->input('id'));

        $affected = DB::table('pemberkatan')->where('id', $id)->update(['status' => 2]);

        return response()->json([
            'success' => '1',
        ]);
    }

    public function decline(Request $request) {
        $id = strip_tags($request->input('id'));

        $affected = DB::table('pemberkatan')->where('id', $id)->update(['status' => 3]);

        return response()->json([
            'success' => '1',
        ]);
    }
}
