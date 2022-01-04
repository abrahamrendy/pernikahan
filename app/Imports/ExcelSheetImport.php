<?php
namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ExcelSheetImport implements WithMultipleSheets 
{
   
    public function sheets(): array
    {
        return [
            0 => new ExcelImport(),
            // 1 => new SecondSheetImport(),
        ];
    }
}

?>