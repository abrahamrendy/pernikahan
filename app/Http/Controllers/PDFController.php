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

    public function generateCertificate($id)
    {
        $id = strip_tags($id);

        $db = DB::select('SELECT t.nama as nama_pria, t.tempat_lahir as tempat_lahir_pria, t.tanggal_lahir as tanggal_lahir_pria, t.nama_ayah as nama_ayah_pria, t.nama_ibu as nama_ibu_pria, calon_mempelai.nama as nama_wanita, calon_mempelai.tempat_lahir as tempat_lahir_wanita, calon_mempelai.tanggal_lahir as tanggal_lahir_wanita, calon_mempelai.nama_ayah as nama_ayah_wanita, calon_mempelai.nama_ibu as nama_ibu_wanita, t.*
                            FROM (SELECT pemberkatan.*, calon_mempelai.nama as nama , calon_mempelai.tempat_lahir as tempat_lahir, calon_mempelai.tanggal_lahir as tanggal_lahir, calon_mempelai.nama_ayah as nama_ayah, calon_mempelai.nama_ibu as nama_ibu, pendeta.nama_pendeta as nama_pendeta FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id LEFT OUTER JOIN pendeta ON pemberkatan.pendeta_id = pendeta.id) as t
                            INNER JOIN calon_mempelai ON t.mempelai_wanita = calon_mempelai.id WHERE t.id = ? AND t.status = 3',[strtoupper($id)]);

        if (!empty($db)){
            $date = new Carbon($db[0]->tanggal);
            if (strtolower($db[0]->status_pernikahan) == 'dd') {
                $type = "Diberkati";  
            } else if (strtolower($db[0]->status_pernikahan) == "sp") {
                $type = "Diberkati";
            } else if (strtolower($db[0]->status_pernikahan) == "pp") {
                $type = "Diteguhkan";
            } else {
                $type = "";
            }

            $tanggal_lahir_pria = new Carbon($db[0]->tanggal_lahir_pria);
            $tanggal_lahir_wanita = new Carbon($db[0]->tanggal_lahir_wanita);
            // $tanggal_pengesahan = new Carbon($db[0]->verified_at);
            $month = $this->numberToRomanRepresentation(date('n', strtotime($date)));
            // $year = date("y", strtotime($date));

            $data = [
                'title' => 'Akte Nikah '.$db[0]->nama_pria.' '.$db[0]->nama_wanita,
                'hari' => $date->locale('id')->isoFormat('dddd'),
                'tanggal' => $date->locale('id')->isoFormat('LL'),
                'type' => $type,
                'status_pernikahan' => strtoupper($db[0]->status_pernikahan),
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
                'tanggal_pengesahan' => $date->locale('id')->isoFormat('LL'),
                'no_sertifikat' => $db[0]->no_sertifikat,
                'month' => $month,
                'qr_code' => $db[0]->qr_code

            ];
              
            $pdf = PDF::loadView('akte', $data);
            $pdf->setPaper('a4', 'portrait');

            // return view('akte', $data);
            return $pdf->download('Akte_'.$db[0]->nama_pria.'_'.$db[0]->nama_wanita.'.pdf');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }
}