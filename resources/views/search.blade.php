@extends("layouts.master")
@section("content")
<h1 align="center"><b><i>Invoice System</i></b></h1>

<a class="btn btn-primary" href="{{ URL::to('/list') }}"> BACK </a><br><br>

<h1><b><i>Search Results:</i></b></h1>
<table class="table is-bordered">
  <thead>
    <tr>
      <th>Invoice Name</th>
      <th>#of items</th>
      <th>Total</th>
      <th></th>      
    </tr>
  </thead>
  
  <tbody>
    @foreach($invoices as $invoice)
      <tr>
        <td><a href="{{ URL::to('/edit/'.$invoice->id)}}">{{$invoice->invoiceName}}</a></td>
        <td>{{$invoice->noOfItems}}</td>
        <td>{{$invoice->invoiceTotal}}</td>
        <td><a href="{{ URL::to('/pdfview/'.$invoice->id) }}" class="button is-success">PDF</a>
            <a href="{{ URL::to('/delete/'.$invoice->id)}}" class="button is-success">Remove</a></td>
    @endforeach
    </tr>
  </tbody>  
</table>
@endsection

