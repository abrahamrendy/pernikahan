<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
  
class PDFController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = [
            'title' => 'Akte',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('akte', $data);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('akte.pdf');
    }

    public function view() {
        return view('akte');
    }

    public function generateCertificate($id)
    {
        $id = strip_tags($id);

        $db = DB::select('SELECT t.nama as nama_pria, t.tempat_lahir as tempat_lahir_pria, t.tanggal_lahir as tanggal_lahir_pria, t.nama_ayah as nama_ayah_pria, t.nama_ibu as nama_ibu_pria, calon_mempelai.nama as nama_wanita, calon_mempelai.tempat_lahir as tempat_lahir_wanita, calon_mempelai.tanggal_lahir as tanggal_lahir_wanita, calon_mempelai.nama_ayah as nama_ayah_wanita, calon_mempelai.nama_ibu as nama_ibu_wanita, t.*
                            FROM (SELECT pemberkatan.*, calon_mempelai.nama as nama , calon_mempelai.tempat_lahir as tempat_lahir, calon_mempelai.tanggal_lahir as tanggal_lahir, calon_mempelai.nama_ayah as nama_ayah, calon_mempelai.nama_ibu as nama_ibu, pendeta.nama_pendeta as nama_pendeta FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id LEFT OUTER JOIN pendeta ON pemberkatan.pendeta_id = pendeta.id) as t
                            INNER JOIN calon_mempelai ON t.mempelai_wanita = calon_mempelai.id WHERE t.id = ?',[strtoupper($id)]);

        $date = new Carbon($db[0]->tanggal);
        if (strtolower($db[0]->status_pernikahan) == 'dd') {
            $type = "Didoakan";  
        } else if (strtolower($db[0]->status_pernikahan) == "sp") {
            $type = "Diberkati";
        } else if (strtolower($db[0]->status_pernikahan) == "pp") {
            $type = "Diteguhkan";
        } else {
            $type = "";
        }

        $tanggal_lahir_pria = new Carbon($db[0]->tanggal_lahir_pria);
        $tanggal_lahir_wanita = new Carbon($db[0]->tanggal_lahir_wanita);
        $tanggal_pengesahan = new Carbon($db[0]->verified_at);

        $data = [
            'title' => 'Akte Nikah '.$db[0]->nama_pria.' '.$db[0]->nama_wanita,
            'hari' => $date->locale('id')->isoFormat('dddd'),
            'tanggal' => $date->locale('id')->isoFormat('LL'),
            'type' => $type,
            'nama_pria' => $db[0]->nama_pria,
            'tempat_lahir_pria' => $db[0]->tempat_lahir_pria,
            'tanggal_lahir_pria' => $tanggal_lahir_pria->locale('id')->isoFormat('LL'),
            'nama_ayah_pria' => $db[0]->nama_ayah_pria,
            'nama_ibu_pria' => $db[0]->nama_ibu_pria,
            'nama_wanita' => $db[0]->nama_wanita,
            'tempat_lahir_wanita' => $db[0]->tempat_lahir_wanita,
            'tanggal_lahir_wanita' => $tanggal_lahir_wanita->locale('id')->isoFormat('LL'),
            'nama_ayah_wanita' => $db[0]->nama_ayah_wanita,
            'nama_ibu_wanita' => $db[0]->nama_ibu_wanita,
            'pas_foto' =>$db[0]->pas_foto,
            'nama_pendeta' =>$db[0]->nama_pendeta,
            'tanggal_pengesahan' => $tanggal_pengesahan->locale('id')->isoFormat('LL')

        ];
          
        $pdf = PDF::loadView('akte', $data);
        $pdf->setPaper('a4', 'portrait');

        // return view('akte', $data);
        return $pdf->download('Akte_'.$db[0]->nama_pria.'_'.$db[0]->nama_wanita.'.pdf');
    }
}