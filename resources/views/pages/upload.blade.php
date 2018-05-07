@extends('default')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<form method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="exampleInputFile">Upload Image</label>
				<input accept="image/x-png,image/gif,image/jpeg" type="file" name="image" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
				<small id="fileHelp" class="form-text text-muted">
					Select an image from your computer (Max upload size: {{ bytesToHuman(Config::get('constants.max_upload_size')) }})
				</small>
			</div>

			<button type="submit" class="btn btn-primary">Upload</button>
		</form>
	</div>
</div>
@endsection
