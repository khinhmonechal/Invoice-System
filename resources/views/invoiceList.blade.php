@extends("layouts.master")
@section("content")
<html>
<head>

</head>
<body>
<h1 align="center"><b><i>Invoice System</i></b></h1>
<form method="post" action="<?= URL::to('search') ?>">
{{ csrf_field()}}
<br>
<div id="main">
<div class="field is-grouped">
    <p class="control">
        <input class="input" type="text" name="search" placeholder="Search by name">
    </p>

      <p class="control">
        <button type="submit" class="button is-success">Search</button>
      </p>
 
      <p class="control" id="add_invoice">
        <a class="button is-info" href="{{url('/add')}}"> + Add Invoice </a>
      </p>
</div>
</form>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br><br>
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
      </tr>
    @endforeach
    
  </tbody>  
</table>
  <div style="width:600px;margin-left:300px;">
    {{ $invoices->links() }}
  </div>
</div>

</body>
</html>
@endsection

