@extends('default')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="row">
				<div class="col-md-4">
					@if(count($images))
						<h3>Approved images</h3>
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
						@if(Auth::check())
						<h3>
							No images yet, start by uploading one 
							<a href="{{ url('image') }}">here</a>
						</h3>
						@else
							<h3>
								No images yet, start by loggin in
								<a href="{{ url('login') }}">here</a>
							</h3>
						@endif
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
