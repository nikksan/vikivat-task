<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="{{ asset('vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="{{ asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="{{ asset('vendor/morrisjs/morris.css') }}" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="container">
		<h3>Login to admin</h3>
		@include('admin.shared.alerts')
		<form method="POST" autocomplete="new-password">
			@csrf
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="new-password">
				<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="new-password">
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>	
	</div>
</body>
</html>