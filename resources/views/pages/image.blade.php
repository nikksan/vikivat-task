@extends('default')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="thumbnail">
			<img src="{{ asset(Storage::url($image->filename)) }}" alt="" style="width: 50%; height: 50%"/>
			<div class="caption">
				@if( Auth::id() && Auth::id() === $image->user->id)
					<form method="post">
						@csrf
						@method('DELETE')
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				@endif
			</div>
		</div>
		
	</div>
</div>
@endsection
