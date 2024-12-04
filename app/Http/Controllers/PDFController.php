<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\User;
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
        $pdf = PDF::loadView('partials.pdf');  
        return $pdf->stream('contextualizacion.pdf');
    }
}
