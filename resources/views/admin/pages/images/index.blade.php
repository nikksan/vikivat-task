@extends('admin.default')

@section('content')
<h2>Images</h2>
<table class="table table-condensed">
	<thead>
		<tr>
			<th>ID</th>
			<th>Uploaded by</th>
			<th>Status</th>
			<th>Preview</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($images as $image)
		<tr>
			<td>{{ $image->id }}</td>
			<td>{{ $image->user->name }}</td>
			<td>{{ $image->approved ? 'Approved' : 'Disapproved' }}</td>
			<td><img style="width:50px" src="{{ asset(Storage::url($image->filename)) }}"/></td>
			<td><a href="{{ url('admin/images/' . $image->id . '/edit' ) }}" class="btn btn-default">Edit</a></td>
		</tr>
		@endforeach
	</tbody>
</table>
{{ $images->links() }}
@endsection