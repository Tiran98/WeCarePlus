<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Supplier;
use App\StockOrder;
use App\Income;
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

    public function incomeList(){
      // retreive all records from db
      $data = Income::all();

      // share data to view
      view()->share('income',$data);
      $pdf = PDF::loadView('pdfs.income_list', $data);
      $pdf->setPaper('A4', 'landscape');

      // download PDF file with download method
      return $pdf->download('income-list.pdf');
    }

    public function expenseList(){
      // retreive all records from db
      $data = Expense::all();

      // share data to view
      view()->share('expense',$data);
      $pdf = PDF::loadView('pdfs.expense_list', $data);
      $pdf->setPaper('A4', 'landscape');

      // download PDF file with download method
      return $pdf->download('expense-list.pdf');
    }
}
