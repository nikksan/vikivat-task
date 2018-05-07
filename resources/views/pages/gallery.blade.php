@extends('default')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-4">
					@if(count($images))
						<h3>Your uploads</h3>
						@foreach($images as $image)
						<div class="thumbnail">
							<a href="{{ url('image/' . $image->id) }}">
								<img src="{{ asset(Storage::url($image->filename)) }}" alt="" style="width:100%">
								<div class="caption">
									<p>Uploaded by {{$image->user->name}}</p>
								</div>
							</a>
						</div>
						@endforeach
					@else
						<h3>Dear, {{ Auth::user()->name }} you dont have images which are approved </h3>
						<p>You can upload images from <a href="{{ url('image') }}">here</a></p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
