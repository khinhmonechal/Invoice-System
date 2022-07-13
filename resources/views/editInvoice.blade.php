@extends("layouts.master")
@section("content")

<html>
<head>
	<title></title>
</head>
<body>

<br>
 <a class="btn btn-primary" href="{{ URL::to('/') }}"> Go to List </a>    
<h1><b>Update Invoice</b></h1><br>
@foreach($inv_datas as $inv_data)
<form method="post" action="<?= URL::to('/update/'.$inv_data->id) ?>">
{{csrf_field()}}
<input type="hidden" name="inv_id" value="{{$inv_data->id}}">
<div class="field is-grouped">
	<label>Invoice Name</label>		
	<p class="control">
	
        <input class="input" type="text" name="invoice_name" id="invoice_name" value="{{$inv_data->invoiceName}}">  
    @endforeach
    </p>
</div>
	<br>
	<table class="table is-striped">
		<thead>
			<tr>
				<th>Item Name</th>
				<th># of items</th>
				<th>Price</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>
		<tbody class="myTable">	
		@foreach($it_datas as $it_data)     	
			<tr>
				<td><input class="input item_name" type="text" name="item_name[]" id="item_name" value="{{$it_data->itemName}}"></td>
				<td><input class="input no_of_items" type="text" name="no_of_items[]" id="no_of_items" value="{{$it_data->noOfItems}}"></td>
		        <td><input class="input price" type="text" name="price[]" id="price[]" value="{{$it_data->price}}"></td>
		        <td><input class="input total" name="total[]" id="total" value="{{$it_data->itemTotal}}"></td>
		        <td><b id="delete" class="button is-danger">Delete</b></td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<br>
	<p class="control">
        <a class="button is-info" id="add_item">        
          +	Add Item
        </a>
    </p>

    <div id="total_div">
	    Sub Total <input class="input sub_total" type="text" name="sub_total" id="sub_total" value="{{$it_data->subTotal}}"><br>
	    Tax		<input class="input tax" type="text" name="tax" id="tax" value="{{$it_data->tax}}"><br>
	    Total	<input class="input grand_total" type="text" name="grand_total" id="grand_total" value="{{$it_data->total}}"><br>
    </div>
    			
    <p class="control">
        <button type="submit" class="button is-info" name="create">Update</button>
    </p>
</form>
</body>
</html>
@endsection
