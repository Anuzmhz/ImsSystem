<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Model\Master\Product;
use App\Model\Transaction\Stock;
use Illuminate\Http\Request;
use TJGazel\Toastr\Facades\Toastr;

class StockController extends Controller
{
    public function index(){
        return view('Transaction.Stock.index');
    }

    public function popup_media_product( )
    {
        return view('Transaction.Stock.view_product');
    }

    public function update(Request $request){
        $detail = new Stock();
        $detail->id_product =  $request->id_raw_product;
        $detail->total = $request->total/1;
        $detail->information = "Stock Correction";
        $detail->type="correction";
        $detail->save();

        $data = Product::find($request->id_raw_product);
        $data->stock_total = ($data->stock_total/1) + ($request->total/1);

        if($data->save()){
            Toastr::success('Data Saved Successfully', 'Success');
            return redirect()->route('transaction/stock');
        }
        Toastr::error('Data cannot Saved Successfully', 'Error');
        return redirect()->route('transaction/stock');

    }
    public function report(){
        return view('Transaction.Stock.report');

    }

}
