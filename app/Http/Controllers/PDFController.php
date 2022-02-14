<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use PDF;
  
class PDFController extends Controller
{
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
    
        return $pdf->download('akte.pdf');
    }

    public function view() {
        return view('akte');
    }
}