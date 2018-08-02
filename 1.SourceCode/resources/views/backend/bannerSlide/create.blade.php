@extends('layouts.backend.app')
@section('content')
<form action="{{ route('storeBannerSlide') }}" method="POST" accept-charset="utf-8" id="formBannerSlide" enctype="multipart/form-data">
	<input name="_token" type="hidden" value="{{ csrf_token() }}">
	<input name="_method" type="hidden" value="POST">
	<div class="panel panel-primary">
	  	<div class="panel-heading">Create</div>
	  	<div class="panel-body">
			<div class="col-sm-6">
				<input type="text" multiple  class="form-control" name="demofileckfinder" id="tenfile">
	  			<button type="button" id="choiceFile">chon file</button>

	  			<br>


	  			<input type="file" name="demofile">
			</div>
	  		<div class="col-sm-6">
				<div class="form-group">
		  			<label>Tiêu đề</label>
		  			<input type="text" class="form-control" name="title">
		  		</div>
		  		<div class="form-group">
		  			<label>Thông tin</label>
		  			<input type="text" class="form-control" name="infomation">
		  		</div>
			</div>
	  	</div>
	  	
	  	<div class="panel-footer">
	  		<button type="submit" class="btn btn-success">Thêm mới</button>
	  	</div>
	</div>
</form>
<script>
	$(document).ready(function(){
		$("#choiceFile").click(function(){
			
			selectFileWithCKFinder( 'tenfile' );
		});
	});

	function selectFileWithCKFinder( elementId ) {
		CKFinder.modal( {
			chooseFiles: true,
			width: 1000,
			height: 600,
			onInit: function( finder ) {
				finder.on( 'files:choose', function( evt ) {
					var file = evt.data.files.first();
					var output = document.getElementById( elementId );
					output.value = file.getUrl();
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( elementId );
					output.value = evt.data.resizedUrl;
				} );
			}
		} );
	}
</script>
@endsection