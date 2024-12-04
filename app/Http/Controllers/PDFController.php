<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
    
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
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'users' => '',
        ]; 
              
        $pdf = Pdf::loadView('myskill.pages.lainnya.sertifikat', $data)->setPaper('a4', 'landscape');
       
        return $pdf->download('sertifikat.pdf');
    }
}
