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

    public function submitEditPemberkatan(Request $request){
        $id = strip_tags($request->input('id'));
        $tempat = strip_tags($request->input('tempat'));
        $tanggal = strip_tags($request->input('tanggal'));
        $tanggal = date("Y-m-d H:i:s", strtotime($tanggal));
        $pas_foto = strip_tags($request->input('pas_foto_text'));
        if($request->hasFile('pas_foto_file')){ 
            $pas_foto_file = $request->file('pas_foto_file');
            $path = $pas_foto_file->storeAs('public/pemberkatan','pas_foto_'.$id.".".$pas_foto_file->getClientOriginalExtension());
            $pas_foto = asset('storage').'/pemberkatan/pas_foto_'.$id.".".$pas_foto_file->getClientOriginalExtension();
        };
        if($pas_foto == ""){
            $pas_foto = null;
        }

        try {
            $affected = DB::table('pemberkatan')->where('id', $id)->update([
                                                                            'tempat' => $tempat,
                                                                            'tanggal' => $tanggal,
                                                                            'pas_foto' => $pas_foto,
                                                                            'updated_at' => date("Y-m-d H:i:s")
                                                                        ]);
        } catch (\Illuminate\Database\QueryException $e) {
            // Do whatever you need if the query failed to execute
            dd($e);
        }

        \Session::flash('success', 'Edit success!');

        return back();
    }

    public function submitEditDetails(Request $request){
        $id = strip_tags($request->input('id'));
        $nama = strip_tags($request->input('nama'));
        $alamat = strip_tags($request->input('alamat'));
        $notelp = strip_tags($request->input('notelp'));
        $tempatlahir = strip_tags($request->input('tempatlahir'));
        $tanggallahir = strip_tags($request->input('tanggallahir'));
        $tanggallahir = date("Y-m-d H:i:s", strtotime($tanggallahir));
        // STATUS NIKAH
        $ktp = strip_tags($request->input('ktp_text'));
        if($request->hasFile('ktp')){ 
            $ktp_file = $request->file('ktp');
            $path = $ktp_file->storeAs('public/details/'.$nama.$id,'ktp_'.$id.".".$ktp_file->getClientOriginalExtension());
            $ktp = asset('storage').'/details/'.$nama.$id.'/ktp_'.$id.".".$ktp_file->getClientOriginalExtension();
        };
        if($ktp == ""){
            $ktp = null;
        }
        $kk = strip_tags($request->input('kartukeluarga_text'));
        if($request->hasFile('kartukeluarga')){ 
            $kk_file = $request->file('kartukeluarga');
            $path = $kk_file->storeAs('public/details/'.$nama.$id,'kk_'.$id.".".$kk_file->getClientOriginalExtension());
            $kk = asset('storage').'/details/'.$nama.$id.'/kk_'.$id.".".$kk_file->getClientOriginalExtension();
        };
        if($kk == ""){
            $kk = null;
        }
        $aktelahir = strip_tags($request->input('aktelahir_text'));
        if($request->hasFile('aktelahir')){ 
            $file = $request->file('aktelahir');
            $path = $file->storeAs('public/details/'.$nama.$id,'aktelahir_'.$id.".".$file->getClientOriginalExtension());
            $aktelahir = asset('storage').'/details/'.$nama.$id.'/aktelahir_'.$id.".".$file->getClientOriginalExtension();
        };
        if($aktelahir == ""){
            $aktelahir = null;
        }
        // ROW 2
        $tempatberibadah = strip_tags($request->input('tempatberibadah'));
        $tanggalberjemaat = strip_tags($request->input('tanggalberjemaat'));
        $tanggalberjemaat = date("Y-m-d H:i:s", strtotime($tanggalberjemaat));
        $nokaj = strip_tags($request->input('nokaj'));
        $tanggalbaptis = strip_tags($request->input('tanggalbaptis'));
        $tanggalbaptis = date("Y-m-d H:i:s", strtotime($tanggalbaptis));
        $gerejabaptis = strip_tags($request->input('gerejabaptis'));
        $suratbaptis = strip_tags($request->input('suratbaptis_text'));
        if($request->hasFile('suratbaptis')){ 
            $file = $request->file('suratbaptis');
            $path = $file->storeAs('public/details/'.$nama.$id,'suratbaptis_'.$id.".".$file->getClientOriginalExtension());
            $suratbaptis = asset('storage').'/details/'.$nama.$id.'/suratbaptis_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratbaptis == ""){
            $suratbaptis = null;
        }
        $suratgantinama = strip_tags($request->input('suratgantinama_text'));
        if($request->hasFile('suratgantinama')){ 
            $file = $request->file('suratgantinama');
            $path = $file->storeAs('public/details/'.$nama.$id,'suratgantinama_'.$id.".".$file->getClientOriginalExtension());
            $suratgantinama = asset('storage').'/details/'.$nama.$id.'/suratgantinama_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratgantinama == ""){
            $suratgantinama = null;
        }
        $kaj = strip_tags($request->input('kaj_text'));
        if($request->hasFile('kaj')){ 
            $file = $request->file('kaj');
            $path = $file->storeAs('public/details/'.$nama.$id,'kaj_'.$id.".".$file->getClientOriginalExtension());
            $kaj = asset('storage').'/details/'.$nama.$id.'/kaj_'.$id.".".$file->getClientOriginalExtension();
        };
        if($kaj == ""){
            $kaj = null;
        }
        $kom100 = strip_tags($request->input('kom100_text'));
        if($request->hasFile('kom100')){ 
            $file = $request->file('kom100');
            $path = $file->storeAs('public/details/'.$nama.$id,'kom100_'.$id.".".$file->getClientOriginalExtension());
            $kom100 = asset('storage').'/details/'.$nama.$id.'/kom100_'.$id.".".$file->getClientOriginalExtension();
        };
        if($kom100 == ""){
            $kom100 = null;
        }
        // ROW 3
        $namaayah = strip_tags($request->input('namaayah'));
        $namaibu = strip_tags($request->input('namaibu'));
        $ktpayah = strip_tags($request->input('ktpayah_text'));
        if($request->hasFile('ktpayah')){ 
            $file = $request->file('ktpayah');
            $path = $file->storeAs('public/details/'.$nama.$id,'ktpayah'.'_'.$id.".".$file->getClientOriginalExtension());
            $ktpayah = asset('storage').'/details/'.$nama.$id.'/'.'ktpayah'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($ktpayah == ""){
            $ktpayah = null;
        }
        $ktpibu = strip_tags($request->input('ktpibu_text'));
        if($request->hasFile('ktpibu')){ 
            $file = $request->file('ktpibu');
            $path = $file->storeAs('public/details/'.$nama.$id,'ktpibu'.'_'.$id.".".$file->getClientOriginalExtension());
            $ktpibu = asset('storage').'/details/'.$nama.$id.'/'.'ktpibu'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($ktpibu == ""){
            $ktpibu = null;
        }
        $suratgantinamaayah = strip_tags($request->input('suratgantinamaayah_text'));
        if($request->hasFile('suratgantinamaayah')){ 
            $file = $request->file('suratgantinamaayah');
            $path = $file->storeAs('public/details/'.$nama.$id,'suratgantinamaayah'.'_'.$id.".".$file->getClientOriginalExtension());
            $suratgantinamaayah = asset('storage').'/details/'.$nama.$id.'/'.'suratgantinamaayah'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratgantinamaayah == ""){
            $suratgantinamaayah = null;
        }
        $suratgantinamaibu = strip_tags($request->input('suratgantinamaibu_text'));
        if($request->hasFile('suratgantinamaibu')){ 
            $file = $request->file('suratgantinamaibu');
            $path = $file->storeAs('public/details/'.$nama.$id,'suratgantinamaibu'.'_'.$id.".".$file->getClientOriginalExtension());
            $suratgantinamaibu = asset('storage').'/details/'.$nama.$id.'/'.'suratgantinamaibu'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratgantinamaibu == ""){
            $suratgantinamaibu = null;
        }
        $aktekematianayah = strip_tags($request->input('aktekematianayah_text'));
        if($request->hasFile('aktekematianayah')){ 
            $file = $request->file('aktekematianayah');
            $path = $file->storeAs('public/details/'.$nama.$id,'aktekematianayah'.'_'.$id.".".$file->getClientOriginalExtension());
            $aktekematianayah = asset('storage').'/details/'.$nama.$id.'/'.'aktekematianayah'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($aktekematianayah == ""){
            $aktekematianayah = null;
        }
        $aktekematianibu = strip_tags($request->input('aktekematianibu_text'));
        if($request->hasFile('aktekematianibu')){ 
            $file = $request->file('aktekematianibu');
            $path = $file->storeAs('public/details/'.$nama.$id,'aktekematianibu'.'_'.$id.".".$file->getClientOriginalExtension());
            $aktekematianibu = asset('storage').'/details/'.$nama.$id.'/'.'aktekematianibu'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($aktekematianibu == ""){
            $aktekematianibu = null;
        }
        $suratpersetujuanortu = strip_tags($request->input('suratpersetujuanortu_text'));
        if($request->hasFile('suratpersetujuanortu')){ 
            $file = $request->file('suratpersetujuanortu');
            $path = $file->storeAs('public/details/'.$nama.$id,'suratpersetujuanortu'.'_'.$id.".".$file->getClientOriginalExtension());
            $suratpersetujuanortu = asset('storage').'/details/'.$nama.$id.'/'.'suratpersetujuanortu'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratpersetujuanortu == ""){
            $suratpersetujuanortu = null;
        }
        $suratketeranganbelumnikah = strip_tags($request->input('suratketeranganbelumnikah_text'));
        if($request->hasFile('suratketeranganbelumnikah')){ 
            $file = $request->file('suratketeranganbelumnikah');
            $path = $file->storeAs('public/details/'.$nama.$id,'suratketeranganbelumnikah'.'_'.$id.".".$file->getClientOriginalExtension());
            $suratketeranganbelumnikah = asset('storage').'/details/'.$nama.$id.'/'.'suratketeranganbelumnikah'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratketeranganbelumnikah == ""){
            $suratketeranganbelumnikah = null;
        }


        try {
            $affected = DB::table('calon_mempelai')->where('id', $id)->update([
                                                                            'nama' => $nama,
                                                                            'tempat_lahir'=> $tempatlahir,
                                                                            'tanggal_lahir'=> $tanggallahir,
                                                                            'alamat' => $alamat,
                                                                            'no_telp' => $notelp,
                                                                            'tempat_ibadah' => $tempatberibadah,
                                                                            'tanggal_baptis' => $tanggalbaptis,
                                                                            'gereja_baptis' => $gerejabaptis,
                                                                            'tanggal_berjemaat' => $tanggalberjemaat,
                                                                            'no_kaj' => $nokaj,
                                                                            'nama_ayah' => $namaayah,
                                                                            'nama_ibu' => $namaibu,
                                                                            'ktp' => $ktp,
                                                                            'kk' => $kk,
                                                                            'akte_lahir' => $aktelahir,
                                                                            'surat_baptis' => $suratbaptis,
                                                                            'surat_ganti_nama' => $suratgantinama,
                                                                            'surat_ganti_nama_ayah' => $suratgantinamaayah,
                                                                            'surat_ganti_nama_ibu' => $suratgantinamaibu,
                                                                            'ktp_ayah' => $ktpayah,
                                                                            'ktp_ibu' => $ktpibu,
                                                                            'akte_kematian_ayah' => $aktekematianayah,
                                                                            'akte_kematian_ibu' => $aktekematianibu,
                                                                            'surat_persetujuan_ortu' => $suratpersetujuanortu,
                                                                            'surat_keterangan_belum_nikah' => $suratketeranganbelumnikah,
                                                                            'kaj' => $kaj,
                                                                            'kom_100' => $kom100,
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
