<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use QrCode;
use DNS2D;
use Storage;

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
        if (Auth::user()->roles == 1) {
            $data = DB::select('SELECT t.nama as nama_pria, calon_mempelai.nama as nama_wanita, t.*
                            FROM (SELECT pemberkatan.*, calon_mempelai.nama as nama, pendeta.nama_pendeta as nama_pendeta FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id LEFT OUTER JOIN pendeta ON pemberkatan.pendeta_id = pendeta.id ) as t
                            INNER JOIN calon_mempelai ON t.mempelai_wanita = calon_mempelai.id
                            WHERE t.status_pernikahan = ? ORDER BY t.id DESC',[strtoupper($type)]);
        } else if (Auth::user()->roles == 2){
            $data = DB::select('SELECT t.nama as nama_pria, calon_mempelai.nama as nama_wanita, t.*
                            FROM (SELECT pemberkatan.*, calon_mempelai.nama as nama, pendeta.nama_pendeta as nama_pendeta FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id LEFT OUTER JOIN pendeta ON pemberkatan.pendeta_id = pendeta.id ) as t
                            INNER JOIN calon_mempelai ON t.mempelai_wanita = calon_mempelai.id
                            WHERE t.status_pernikahan = ? AND t.status = 0 OR t.status = 1 ORDER BY t.status, t.id DESC',[strtoupper($type)]);
        } else if (Auth::user()->roles == 3) {
            $data = DB::select('SELECT t.nama as nama_pria, calon_mempelai.nama as nama_wanita, t.*
                            FROM (SELECT pemberkatan.*, calon_mempelai.nama as nama, pendeta.nama_pendeta as nama_pendeta FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id LEFT OUTER JOIN pendeta ON pemberkatan.pendeta_id = pendeta.id ) as t
                            INNER JOIN calon_mempelai ON t.mempelai_wanita = calon_mempelai.id
                            WHERE t.status_pernikahan = ? AND t.status = 1 OR t.status = 2 OR t.status = 3 ORDER BY t.status, t.id DESC',[strtoupper($type)]);
        } else if (Auth::user()->roles == 5) {
            $data = DB::select('SELECT t.nama as nama_pria, calon_mempelai.nama as nama_wanita, t.*
                            FROM (SELECT pemberkatan.*, calon_mempelai.nama as nama, pendeta.nama_pendeta as nama_pendeta FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id LEFT OUTER JOIN pendeta ON pemberkatan.pendeta_id = pendeta.id ) as t
                            INNER JOIN calon_mempelai ON t.mempelai_wanita = calon_mempelai.id
                            WHERE t.status_pernikahan = ? AND t.status = 2 OR t.status = 3 ORDER BY t.status, t.id DESC',[strtoupper($type)]);
        }

        $pendeta = DB::table('pendeta')->get();

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

        
        return view('data', ['title' => $title, 'data' => $data, 'pendeta' => $pendeta]);
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
        if (Auth::user()->roles == 1 || Auth::user()->roles == 2) {
            $id = strip_tags($request->input('id'));

            $affected = DB::table('pemberkatan')->leftJoin('pendeta', 'pemberkatan.pendeta_id', '=', 'pendeta.id')->where('pemberkatan.id', $id)->update(['status' => 1]);

            return response()->json([
                'success' => '1',
            ]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function verify(Request $request) {
        if (Auth::user()->roles == 1 || Auth::user()->roles == 3) {
            $id = strip_tags($request->input('id'));

            $affected = DB::table('pemberkatan')->where('id', $id)->update(['status' => 2, 'verified_at' => date("Y-m-d H:i:s")]);

            return response()->json([
                'success' => '1',
            ]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function authorized(Request $request) {
        if (Auth::user()->roles == 1 || Auth::user()->roles == 5) {
            $id = strip_tags($request->input('id'));

            $temp = DB::table('settings')->first();
            $no_sertifikat = $temp->no_sertifikat + 1;

            $tempString = route('qr-view',$id);
            Storage::disk('public_uploads')->put('qrcodes/'.$id.'.png',base64_decode(DNS2D::getBarcodePNG($tempString, "QRCODE", 10,10)));
            $qr_code = '/uploads'.'/qrcodes/'.$id.".png";

            $update = DB::table('settings')->where('id', 1)->update(['no_sertifikat' => $no_sertifikat]);

            $affected = DB::table('pemberkatan')->where('id', $id)->update(['status' => 3, 'no_sertifikat' => $no_sertifikat, 'qr_code' => $qr_code,'verified_at' => date("Y-m-d H:i:s")]);

            return response()->json([
                'success' => '1',
            ]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function decline(Request $request) {
        if (Auth::user()->roles == 1) {
            $id = strip_tags($request->input('id'));

            $affected = DB::table('pemberkatan')->where('id', $id)->update(['status' => 4]);

            return response()->json([
                'success' => '1',
            ]);
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function numberToRomanRepresentation($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }

    public function submitEditPemberkatan(Request $request){
        $id = strip_tags($request->input('id'));
        $tempat = strip_tags($request->input('tempat'));
        $tanggal = strip_tags($request->input('tanggal'));
        $pendeta_id = strip_tags($request->input('pendeta'));
        if ($pendeta_id == "") {
            $pendeta_id = null;
        }
        $pas_foto = strip_tags($request->input('pas_foto_text'));
        $tanggal = date("Y-m-d H:i:s", strtotime($tanggal));
        if($request->hasFile('pas_foto_file')){ 
            $pas_foto_file = $request->file('pas_foto_file');
            // $path = $pas_foto_file->storeAs('public/pemberkatan','pas_foto_'.$id.".".$pas_foto_file->getClientOriginalExtension());
            $path = $pas_foto_file->storeAs('pemberkatan','pas_foto_'.$id.".".$pas_foto_file->getClientOriginalExtension(), 'public_uploads');
            // $pas_foto = asset('storage').'/pemberkatan/pas_foto_'.$id.".".$pas_foto_file->getClientOriginalExtension();
            $pas_foto = '/uploads'.'/pemberkatan/pas_foto_'.$id.".".$pas_foto_file->getClientOriginalExtension();
        };
        if($pas_foto == ""){
            $pas_foto = null;
        }

        try {
            $affected = DB::table('pemberkatan')->where('id', $id)->update([
                                                                            'tempat' => $tempat,
                                                                            'tanggal' => $tanggal,
                                                                            'pas_foto' => $pas_foto,
                                                                            'pendeta_id' => $pendeta_id,
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
            // $path = $ktp_file->storeAs('public/details/'.$nama.$id,'ktp_'.$id.".".$ktp_file->getClientOriginalExtension());
            $path = $ktp_file->storeAs('details/'.$nama.$id,'ktp_'.$id.".".$ktp_file->getClientOriginalExtension(), 'public_uploads');
            // $ktp = asset('storage').'/details/'.$nama.$id.'/ktp_'.$id.".".$ktp_file->getClientOriginalExtension();
            $ktp = '/uploads'.'/details/'.$nama.$id.'/ktp_'.$id.".".$ktp_file->getClientOriginalExtension();
        };
        if($ktp == ""){
            $ktp = null;
        }
        $kk = strip_tags($request->input('kartukeluarga_text'));
        if($request->hasFile('kartukeluarga')){ 
            $kk_file = $request->file('kartukeluarga');
            $path = $kk_file->storeAs('details/'.$nama.$id,'kk_'.$id.".".$kk_file->getClientOriginalExtension(), 'public_uploads');
            $kk = '/uploads'.'/details/'.$nama.$id.'/kk_'.$id.".".$kk_file->getClientOriginalExtension();
        };
        if($kk == ""){
            $kk = null;
        }
        $aktelahir = strip_tags($request->input('aktelahir_text'));
        if($request->hasFile('aktelahir')){ 
            $file = $request->file('aktelahir');
            $path = $file->storeAs('details/'.$nama.$id,'aktelahir_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $aktelahir = '/uploads'.'/details/'.$nama.$id.'/aktelahir_'.$id.".".$file->getClientOriginalExtension();
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
            $path = $file->storeAs('details/'.$nama.$id,'suratbaptis_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $suratbaptis = '/uploads'.'/details/'.$nama.$id.'/suratbaptis_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratbaptis == ""){
            $suratbaptis = null;
        }
        $suratgantinama = strip_tags($request->input('suratgantinama_text'));
        if($request->hasFile('suratgantinama')){ 
            $file = $request->file('suratgantinama');
            $path = $file->storeAs('details/'.$nama.$id,'suratgantinama_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $suratgantinama = '/uploads'.'/details/'.$nama.$id.'/suratgantinama_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratgantinama == ""){
            $suratgantinama = null;
        }
        $kaj = strip_tags($request->input('kaj_text'));
        if($request->hasFile('kaj')){ 
            $file = $request->file('kaj');
            $path = $file->storeAs('details/'.$nama.$id,'kaj_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $kaj = '/uploads'.'/details/'.$nama.$id.'/kaj_'.$id.".".$file->getClientOriginalExtension();
        };
        if($kaj == ""){
            $kaj = null;
        }
        $kom100 = strip_tags($request->input('kom100_text'));
        if($request->hasFile('kom100')){ 
            $file = $request->file('kom100');
            $path = $file->storeAs('details/'.$nama.$id,'kom100_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $kom100 = '/uploads'.'/details/'.$nama.$id.'/kom100_'.$id.".".$file->getClientOriginalExtension();
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
            $path = $file->storeAs('details/'.$nama.$id,'ktpayah'.'_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $ktpayah = '/uploads'.'/details/'.$nama.$id.'/'.'ktpayah'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($ktpayah == ""){
            $ktpayah = null;
        }
        $ktpibu = strip_tags($request->input('ktpibu_text'));
        if($request->hasFile('ktpibu')){ 
            $file = $request->file('ktpibu');
            $path = $file->storeAs('details/'.$nama.$id,'ktpibu'.'_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $ktpibu = '/uploads'.'/details/'.$nama.$id.'/'.'ktpibu'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($ktpibu == ""){
            $ktpibu = null;
        }
        $suratgantinamaayah = strip_tags($request->input('suratgantinamaayah_text'));
        if($request->hasFile('suratgantinamaayah')){ 
            $file = $request->file('suratgantinamaayah');
            $path = $file->storeAs('details/'.$nama.$id,'suratgantinamaayah'.'_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $suratgantinamaayah = '/uploads'.'/details/'.$nama.$id.'/'.'suratgantinamaayah'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratgantinamaayah == ""){
            $suratgantinamaayah = null;
        }
        $suratgantinamaibu = strip_tags($request->input('suratgantinamaibu_text'));
        if($request->hasFile('suratgantinamaibu')){ 
            $file = $request->file('suratgantinamaibu');
            $path = $file->storeAs('details/'.$nama.$id,'suratgantinamaibu'.'_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $suratgantinamaibu = '/uploads'.'/details/'.$nama.$id.'/'.'suratgantinamaibu'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratgantinamaibu == ""){
            $suratgantinamaibu = null;
        }
        $aktekematianayah = strip_tags($request->input('aktekematianayah_text'));
        if($request->hasFile('aktekematianayah')){ 
            $file = $request->file('aktekematianayah');
            $path = $file->storeAs('details/'.$nama.$id,'aktekematianayah'.'_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $aktekematianayah = '/uploads'.'/details/'.$nama.$id.'/'.'aktekematianayah'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($aktekematianayah == ""){
            $aktekematianayah = null;
        }
        $aktekematianibu = strip_tags($request->input('aktekematianibu_text'));
        if($request->hasFile('aktekematianibu')){ 
            $file = $request->file('aktekematianibu');
            $path = $file->storeAs('details/'.$nama.$id,'aktekematianibu'.'_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $aktekematianibu = '/uploads'.'/details/'.$nama.$id.'/'.'aktekematianibu'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($aktekematianibu == ""){
            $aktekematianibu = null;
        }
        $suratpersetujuanortu = strip_tags($request->input('suratpersetujuanortu_text'));
        if($request->hasFile('suratpersetujuanortu')){ 
            $file = $request->file('suratpersetujuanortu');
            $path = $file->storeAs('details/'.$nama.$id,'suratpersetujuanortu'.'_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $suratpersetujuanortu = '/uploads'.'/details/'.$nama.$id.'/'.'suratpersetujuanortu'.'_'.$id.".".$file->getClientOriginalExtension();
        };
        if($suratpersetujuanortu == ""){
            $suratpersetujuanortu = null;
        }
        $suratketeranganbelumnikah = strip_tags($request->input('suratketeranganbelumnikah_text'));
        if($request->hasFile('suratketeranganbelumnikah')){ 
            $file = $request->file('suratketeranganbelumnikah');
            $path = $file->storeAs('details/'.$nama.$id,'suratketeranganbelumnikah'.'_'.$id.".".$file->getClientOriginalExtension(), 'public_uploads');
            $suratketeranganbelumnikah = '/uploads'.'/details/'.$nama.$id.'/'.'suratketeranganbelumnikah'.'_'.$id.".".$file->getClientOriginalExtension();
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
