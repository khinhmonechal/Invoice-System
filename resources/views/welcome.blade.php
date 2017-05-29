@extends("layouts.master")
@section("content")
<html>
<head>
    <title></title>
</head>
<body>
<br>
<div id="main">
<div class="field is-grouped">
    <p class="control">
        <input class="input" type="text" id="">
    </p>

      <p class="control">
        <a class="button is-primary" href="#">
          Search
        </a>
      </p>
 
      <p class="control">
        <a class="button is-info" href="{{url('/add')}}">
         + Add Invoice
        </a>
      </p>
</div>
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
    <tr>
      <td><a href="#">Aston Villa</a> <strong>(R)</strong>
      </td>
      <td>38</td>
      <td>3</td>
      <td>
          <a href="#" title="Aston Villa F.C.">PDF</a>
    
          <a href="#" title="Aston Villa F.C.">Remove</a>
      </td>
      
    </tr>
  </tbody>
  
</table>
<nav class="pagination is-right">
  <a class="pagination-previous">Previous</a>
  <a class="pagination-next">Next page</a>
  <ul class="pagination-list">
    <!-- <li><a class="pagination-link">1</a></li>
    <li><span class="pagination-ellipsis">&hellip;</span></li>
    <li><a class="pagination-link">5</a></li>
    <li><a class="pagination-link is-current">7</a></li>
    <li><a class="pagination-link">9</a></li>
    <li><span class="pagination-ellipsis">&hellip;</span></li>
    <li><a class="pagination-link">15</a></li> -->
  </ul>
</nav>
</div>
</body>
</html>
@endsection

