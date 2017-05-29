@extends("layouts.master")
@section("content")

<html>
<head>
	<title></title>	
</head>
<body>
<br>

<a class="btn btn-primary" href="{{ URL::to('/list') }}"> Go to List </a><br><br>
<h1><b>New Invoice</b></h1><br>
<form method="post" action="<?= URL::to('create') ?>">
{{csrf_field()}}
<div class="field is-grouped">
	<label>Invoice Name</label>		
	<p class="control">
        <input class="input" type="text" name="invoice_name" id="invoice_name">
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
			<tr>
				<td><input class="input item_name" type="text" name="item_name[]" id="item_name"></td>
				<td><input class="input no_of_items" type="text" name="no_of_items[]" id="no_of_items"></td>
				<td><input class="input price" type="text" name="price[]" id="price"></td>
				<td><input class="input total" name="total[]" id="total"></td>
				<td><b id="delete" class="button is-danger">Delete</b></td>
			</tr>
		</tbody>
	</table>
	<br>
	<p class="control">
        <a class="button is-info" id="add_item">        
          +	Add Item
        </a>
    </p>

    <div id="total_div">
	    Sub Total <input class="input sub_total" type="text" name="sub_total" id="sub_total"><br>
	    Tax		<input class="input tax" type="text" name="tax" id="tax"><br>
	    Total	<input class="input grand_total" type="text" name="grand_total" id="grand_total"><br>
    </div>

    <p class="control">
        <button type="submit" class="button is-info" name="create">Create</button>
    </p>
</form>
</body>
</html>
@endsection
