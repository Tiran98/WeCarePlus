<?php

namespace App\Http\Controllers;
use App\Supplier;
use App\StockOrder;
use App\Patient;
use Illuminate\Http\Request;
use PDF;

class PdfGenerateController extends Controller
{
    public function orderHistory(){
        // retreive all records from db
      $data = StockOrder::with('suppliers')->get();

      // share data to view
      view()->share('order',$data);
      $pdf = PDF::loadView('pdfs.order_history_list', $data);
      $pdf->setPaper('A4', 'landscape');

      // download PDF file with download method
      return $pdf->download('order-history.pdf');
    }

    public function supplierList(){
          // retreive all records from db
      $data = Supplier::all();

      // share data to view
      view()->share('supplier',$data);
      $pdf = PDF::loadView('pdfs.supplier_list', $data);
      $pdf->setPaper('A4', 'landscape');

      // download PDF file with download method
      return $pdf->download('supplier-list.pdf');
    }

    public function patientListGen(){
          // retreive all records from db
      $data = Patient::all();

      // share data to view
      view()->share('patient',$data);
      $pdf = PDF::loadView('pdfs.patient_list', $data);
      $pdf->setPaper('A4', 'landscape');

      // download PDF file with download method
      return $pdf->download('patient_list.pdf');
    }
}
