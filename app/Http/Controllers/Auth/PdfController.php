<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Mpdf\Mpdf;
use PDF;

class PdfController extends Controller {

    // Display user data in view
    // Generate PDF
    public function createPDF() {
        // retreive all records from db
        //   $data = Employee::all();
        // ini_set('max_execution_time', 300);
        //   // share data to view
        //   view()->share('employee',$data);
        //   $pdf = PDF::loadView('pdf_view');

        // download PDF file with download method

        //   PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        //   $pdf = PDF::loadView('pdf_view');
        //   return view('pdf_view',$data);
        //   return $pdf->stream('pdf_file.pdf'); //แบบนี้จะ stream มา preview
        //   return $pdf->download('pdf_file.pdf'); //แบบนี้จะดาวโหลดเลย




        $mpdf = new \Mpdf\Mpdf([
                'mode' => 'utf-8',
            ]);

        $html =  view('pdf_view');

        asset('vendor/autoload.php');

        $mpdf->AddPage('P','A4', '', '', '',10,10,10,10,0,0);

        // $mpdf->SetAutoFont(AUTOFONT_THAIVIET);
        $mpdf->WriteHTML($html);
        $mpdf->Output("box.pdf", "I");

    }
}
