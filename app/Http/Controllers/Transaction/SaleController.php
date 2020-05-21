<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Model\Master\Product;
use App\Model\Transaction\Sales\SalesD;
use App\Model\Transaction\Sales\SalesH;
use App\Model\Transaction\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TJGazel\Toastr\Facades\Toastr;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Transaction.Sales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detail_count = 0;
        return view('Transaction.Sales.create', compact('detail_count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new SalesH();
        $data->date = date('Y-m-d', strtotime($request->date));
        $data->invoice_no = $request->invoice_no;
        $data->shop_name = $request->shop_name;
        $data->information = $request->information;
        $data->active = 1;
        $data->user_modified = Auth::user()->id;
        $total = 0;
        if ($data->save()) {
            $id_sales = $data->id;
            if (isset($_POST['id_raw_product'])) {
                foreach ($_POST['id_raw_product'] as $key => $id_raw_product) ;
                $detail = new SalesD();
                $detail->id_sales = $data->id;
                $detail->id_product = $id_raw_product;
                $detail->total = $_POST['total'][$key];
                $detail->price = $_POST['price'][$key];
                $total = $total + ($detail->total * $detail->price);
                $detail->save();
            }
            $data = SalesH::find($id_sales);
            $data->total = $total;
            $data->save();
            $dataH = SalesH::find($id_sales);
            $data= SalesD::where('id_sales','=',$id_sales)->orderBy('id','ASC')->get();
            foreach($data as $data){
                $detail = new Stock();
                $detail->id_product = $data->id_product;
                $detail->information = $dataH->invoice_no;
                $detail->total = $data->total*-1;
                $detail->type = "sell";
                $detail->save();
                $detail = Product::find($data->id_product);
                $detail->selling_price =  $data->price;
                $detail->stock_total = $detail->stock_total-$data->total;
                $detail->save();
            }


            Toastr::success('Data saved Successfully.', 'Success');
            return redirect()->route('sales.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function popup_media_product($id_count = null)
    {
        return view('Transaction.Sales.view_product')->with('id_count', $id_count);
    }

}
