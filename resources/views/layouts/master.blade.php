<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('../public/css/bulma.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('../public/css/invoice.css') }}">
	
	<script src="{{ URL::asset('../public/js/jquery.js') }}"></script>
	<script src="{{ URL::asset('../public/js/add_row.js') }}"></script>
</head>
<body>
	<div class="container">
		@yield("content")
	</div>
</body>
</html>