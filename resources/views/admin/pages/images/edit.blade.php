@extends('admin.default')

@section('content')
<h3>Editing Image #{{ $image->id }}</h3>

<form method="post" action="{{ url('admin/images/' . $image->id  ) }}">
	@method('DELETE')
	@csrf
	<button type="submit" class="btn btn-danger">Delete</button>
</form>


<img src="{{ asset(Storage::url($image->filename)) }}">
<form method="post" action="{{ url('admin/images/' . $image->id  ) }}">
 	@method('PUT')
	@csrf

	<div class="form-group">
		<label for="sel1">Status:</label>
		<select name="approved" class="form-control" id="">
			<option {{ $image->approved ? 'selected' : '' }} value="1">Approved</option>
			<option {{ !$image->approved ? 'selected' : '' }} value="0">Disaapproved</option>
		</select>
	</div>

	<button class="btn btn-primary" type="submit">Update</button>
</form>
@endsection