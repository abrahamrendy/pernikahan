<?php

namespace App\Http\Controllers;

use App\Models\CalonMempelai;
use App\Models\Pemberkatan;

use Illuminate\Http\Request;
use App\Imports\ExcelSheetImport;

class ExcelController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('excel.index');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function exportExcel($type) 
    {
        // return \Excel::download(new ExcelExport, 'calon_mempelai.'.$type);
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExcel(Request $request) 
    {
        \Excel::import(new ExcelSheetImport,$request->import_file);

        \Session::put('success', 'Your file is imported successfully in database.');
           
        return back();
    }
}
