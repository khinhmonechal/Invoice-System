@extends("layouts.master")
@section("content")

<html>
<head>
    <title></title>
</head>
<body>
<h1 align="center"><b><i>Invoice System</i></b></h1>
<br>

<div class="field is-grouped">
    Invoice Name :  
    {{ $invoices->invoiceName }} 
</div>
    <br>
    <table class="table is-striped" align="center">
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
         @foreach($items as $item)
            <tr>
                <td>{{ $item->itemName }}</td>
                <td>{{ $item->noOfItems }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->itemTotal }}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
    
    <div>
        Sub Total : {{ $item->subTotal }}<br>
        Tax :  {{ $item->tax }} <br>
        Total  : {{ $invoices->invoiceTotal }}    
    </div>
                
    </body>
</html>
@endsection
