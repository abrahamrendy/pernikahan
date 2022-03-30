<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use QrCode;
use DNS2D;
use Storage;

class CheckerController extends Controller
{
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

    public function check($id) {
        $id = strip_tags($id);

        // $db = DB::select('SELECT t.nama as nama_pria, t.tempat_lahir as tempat_lahir_pria, t.tanggal_lahir as tanggal_lahir_pria, t.nama_ayah as nama_ayah_pria, t.nama_ibu as nama_ibu_pria, calon_mempelai.nama as nama_wanita, calon_mempelai.tempat_lahir as tempat_lahir_wanita, calon_mempelai.tanggal_lahir as tanggal_lahir_wanita, calon_mempelai.nama_ayah as nama_ayah_wanita, calon_mempelai.nama_ibu as nama_ibu_wanita, t.*
        //                     FROM (SELECT pemberkatan.*, calon_mempelai.nama as nama , calon_mempelai.tempat_lahir as tempat_lahir, calon_mempelai.tanggal_lahir as tanggal_lahir, calon_mempelai.nama_ayah as nama_ayah, calon_mempelai.nama_ibu as nama_ibu, pendeta.nama_pendeta as nama_pendeta FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id LEFT OUTER JOIN pendeta ON pemberkatan.pendeta_id = pendeta.id) as t
        //                     INNER JOIN calon_mempelai ON t.mempelai_wanita = calon_mempelai.id WHERE t.id = ? AND t.status = 3',[strtoupper($id)]);
         $db = DB::select('SELECT t.nama as nama_pria, calon_mempelai.nama as nama_wanita, t.*
                            FROM (SELECT pemberkatan.*, calon_mempelai.nama as nama FROM pemberkatan INNER JOIN calon_mempelai ON pemberkatan.mempelai_pria = calon_mempelai.id) as t
                            INNER JOIN calon_mempelai ON t.mempelai_wanita = calon_mempelai.id WHERE t.id = ? AND t.status = 3',[strtoupper($id)]);

        if (!empty($db)){
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

            $month = $this->numberToRomanRepresentation(date('n', strtotime($date)));
            // $year = date("y", strtotime($date));

            $data = [
                'title' => 'Online Certificate Check',
                'hari' => $date->locale('id')->isoFormat('dddd'),
                'tanggal' => $date->locale('id')->isoFormat('LL'),
                'type' => $type,
                'status_pernikahan' => strtoupper($db[0]->status_pernikahan),
                'nama_pria' => $db[0]->nama_pria,
                'nama_wanita' => $db[0]->nama_wanita,
                'pas_foto' =>$db[0]->pas_foto,
                'tanggal_pengesahan' => $date->locale('id')->isoFormat('LL'),
                'no_sertifikat' => $db[0]->no_sertifikat,
                'month' => $month,

            ];

            return view('check', $data);

        } else {
            abort(404, 'Not found.');
        }

    }
}
