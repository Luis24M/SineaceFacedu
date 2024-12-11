<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subcomite;
use App\Models\Contextualizacion;
use App\Models\Narrativa;
use App\Models\Problematica;
use App\Models\Estandar;
use Illuminate\Support\Facades\Auth;

use PDF;
    
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private function getSubcomite()
    {
        return Subcomite::whereIn('id', Auth::user()->subcomite_ids)->first();
    }

    private function getNarrativa($id)
    {
        return Narrativa::where('id', $id)->first();
    }

    private function getContextualizacion($id)
    {
        return Contextualizacion::where('id', $id)->first();
    }
    public function generatePDF(Estandar $estandar)
    {   
        $subcomite = $estandar->subcomite;
        $contextualizacion = $estandar->contextualizacion  ;
        $narrativa = $contextualizacion->narrativa ;
        $problematicas = $narrativa->problematicas ;
        $infoEstandar = $estandar->infoEstandar;

        $pdf = PDF::loadView('partials.pdf', compact('subcomite', 'estandar','narrativa','problematicas','contextualizacion'));  
        return $pdf->stream('contextualizacion.pdf');
    }
}
