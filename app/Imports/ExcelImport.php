<?php

namespace App\Imports;

use App\Models\CalonMempelai;
use App\Models\Pemberkatan;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ExcelImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows)
    {
        // echo "<pre>";
        // print_r($rows);
        // echo "</pre>";
        // $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(44898.41666666666424);
        // print_r ($date);
        // echo $date->date;
        // echo date("Y-m-d H:i:s", strtotime($date->date));
        foreach ($rows as $row) 
        {
            $kaj_pria = $row[13];
            $count_pria = CalonMempelai::where('kaj', $kaj_pria)->count();
            $kaj_wanita = $row[28];
            $count_wanita = CalonMempelai::where('kaj', $kaj_wanita)->count();
            
            if ($count_pria > 0 && $count_wanita > 0) {
                // PRIA
                $pria = CalonMempelai::create([
                    'nama' => $row[2],
                    'gender' => '0',
                    'tanggal_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]),
                    'tempat_lahir' => $row[3],
                    'alamat' => $row[6],
                    'no_telp' => $row[7],
                    'tempat_ibadah' => $row[8],
                    'tanggal_baptis' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]),
                    'gereja_baptis' => $row[11],
                    'tanggal_berjemaat' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[12]),
                    'no_kaj'=> $row[13],
                    'status_nikah' => ($row[14] == "Sudah pernah menikah") ? 1 : 0,
                    'nama_ayah' => $row[15],
                    'nama_ibu' => $row[16],
                    'ktp' => $row[37],
                    'kk' => $row[38],
                    'akte_lahir' => $row[39],
                    'surat_baptis' => $row[40],
                    'surat_ganti_nama' => $row[41],
                    'surat_ganti_nama_ayah' => $row[42],
                    'surat_ganti_nama_ibu' => $row[43],
                    'ktp_ayah' => $row[44],
                    'ktp_ibu' => $row[45],
                    'akte_kematian_ayah' => $row[46],
                    'akte_kematian_ibu' => $row[47],
                    'surat_persetujuan_ortu' => $row[48],
                    'surat_keterangan_belum_nikah' => $row[49],
                    'kaj' => $row[50],
                    'kom_100' => $row[51],
                    'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0]),
                ]);

                // WANITA
                $wanita = CalonMempelai::create([
                    'nama' => $row[17],
                    'gender' => '1',
                    'tanggal_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[19]),
                    'tempat_lahir' => $row[18],
                    'alamat' => $row[21],
                    'no_telp' => $row[22],
                    'tempat_ibadah' => $row[23],
                    'tanggal_baptis' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[25]),
                    'gereja_baptis' => $row[26],
                    'tanggal_berjemaat' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[27]),
                    'no_kaj'=> $row[28],
                    'status_nikah' => ($row[29] == "Sudah pernah menikah") ? 1 : 0,
                    'nama_ayah' => $row[30],
                    'nama_ibu' => $row[31],
                    'ktp' => $row[52],
                    'kk' => $row[53],
                    'akte_lahir' => $row[54],
                    'surat_baptis' => $row[55],
                    'surat_ganti_nama' => $row[56],
                    'surat_ganti_nama_ayah' => $row[57],
                    'surat_ganti_nama_ibu' => $row[68],
                    'ktp_ayah' => $row[58],
                    'ktp_ibu' => $row[59],
                    'akte_kematian_ayah' => $row[60],
                    'akte_kematian_ibu' => $row[61],
                    'surat_persetujuan_ortu' => $row[62],
                    'surat_keterangan_belum_nikah' => $row[63],
                    'kaj' => $row[64],
                    'kom_100' => $row[65],
                    'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0]),
                ]);

                $pemberkatan = Pemberkatan::create([
                    'mempelai_pria' => $pria->id,
                    'mempelai_wanita' => $wanita->id,
                    // 'status_pernikahan' => $row[32],
                    'status_pernikahan' => "sp",
                    'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[34] + $row[35]),
                    'tempat' => $row[36],
                    'cabang_asal' => $row[8],
                    'surat_pernyataan' => $row[66],
                    'pas_foto' => $row[67],
                    'created_at' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[0]),
                ]);
            }
        }
    }


    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }
}
