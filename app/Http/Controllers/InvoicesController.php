<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Invoices;
use App\Items;
use PDF;
use Illuminate\Support\Facades\Validator;

class InvoicesController extends Controller
{
    public function index(){
	    $invoices = DB::table('invoices')->latest()->paginate(5);
        return view('invoiceList', ['invoices' => $invoices]);        
    }

    public function addInvoice(){
    	return view('addInvoice');
    }

    public function create(Request $request){
        // dd('lll');
        $validator = Validator::make($request->all(), [
                'invoice_name' => 'required|max:255',
                'item_name' => 'required',
                'no_of_items' => 'required',
                'price' => 'required',
                'tax' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    	
		$row = $request->get('item_name');
		$rowcount = count($row); 

    	$invoices = new Invoices;
    	$invoices->invoiceName = $request->get('invoice_name');
    	$invoices->noOfItems = $rowcount;
    	$invoices->invoiceTotal = $request->get('grand_total');
    	$invoices->save();

    	$id = $invoices->id;

    	$items = array();

    	for($i=0;$i<$rowcount;$i++){
    		$items[$i]['itemName'] = $request->get('item_name')[$i];
    		$items[$i]['noOfItems'] = $request->get('no_of_items')[$i];
    		$items[$i]['price'] = $request->get('price')[$i];
    		$items[$i]['itemTotal'] = $request->get('total')[$i];
    		$items[$i]['subTotal'] = $request->get('sub_total');
    		$items[$i]['tax'] = $request->get('tax');
    		$items[$i]['total'] = $request->get('grand_total');
    		$items[$i]['inv_id'] = $id;
    	}
    	Items::insert($items);

		return redirect('/')->with('success','Created successfully!!!');
	}

	public function delete($id){    	
    	Invoices::where('id', $id)->delete();    	    	
        Items::where('inv_id', $id)->delete();
        return redirect('/')->with('success','Deleted successfully!!!');
    }

    
    public function search(Request $request){
    	$search_data = $request->get('search');

	    	if($search_data != null)
	    	{
		    	$invoices = Invoices::where('invoiceName', 'LIKE', '%'.$search_data.'%')->get();
		    	return view('search',compact('invoices'));
	    	} 
	    	else 
	    	{
	    		return "Search box is blank";
	    	}
    	}
    
    public function editInvoice($id){

       	$inv_datas = Invoices::where('id', $id)->get();
       	$it_datas = Items::where('inv_id',$id)->get();
    	return view('editInvoice', ['inv_datas' => $inv_datas],['it_datas' => $it_datas]);    
    }

    public function update(Request $request,$id)
    {
    	$invid = $request->get('inv_id');
    	$invoices = Invoices::find($id);
    	
		$row = $request->get('item_name');
		$rowcount = count($row); 

    	$invoices->invoiceName = $request->get('invoice_name');
    	$invoices->noOfItems = $rowcount;
    	$invoices->invoiceTotal = $request->get('grand_total');
    	$invoices->save();
    	// dd($invoices);
		Items::where('inv_id',$invid)->delete();
		$items = array();

    	for($i=0;$i<$rowcount;$i++){
    		$items[$i]['itemName'] = $request->get('item_name')[$i];
    		$items[$i]['noOfItems'] = $request->get('no_of_items')[$i];
    		$items[$i]['price'] = $request->get('price')[$i];
    		$items[$i]['itemTotal'] = $request->get('total')[$i];
    		$items[$i]['subTotal'] = $request->get('sub_total');
    		$items[$i]['tax'] = $request->get('tax');
    		$items[$i]['total'] = $request->get('grand_total');
    		$items[$i]['inv_id'] = $id;
    	}
    	Items::insert($items);

		return redirect('/')->with('success','Updated successfully!!!');		
    }

    public function pdfview($id){
        $invoices = Invoices::where('id',$id)->first();
        $items = Items::where('inv_id',$id)->get();
        
        view()->share('invoices' ,$invoices);
        view()->share('items',$items);
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
            // return $pdf->stream();
    }       
}
