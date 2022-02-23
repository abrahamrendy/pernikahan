<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
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
        $pdf->set('chroot', storage_path());
        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('akte.pdf');
    }

    public function view() {
        return view('akte');
    }
}