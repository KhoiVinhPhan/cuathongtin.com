@extends('layouts.backend.app')
@section('content')
<form action="{{ route('updateBannerSlide') }}" method="POST" accept-charset="utf-8" id="formBannerSlide" enctype="multipart/form-data">
	<input name="_token" type="hidden" value="{{ csrf_token() }}">
	<input name="_method" type="hidden" value="POST">
	<input name="banner_slide_id" type="text" hidden value="{{ $banner->banner_slide_id }}">
	<div class="panel panel-primary">
	  	<div class="panel-heading">Edit</div>
	  	<div class="panel-body">
			<div class="col-sm-6">
				<img src="@if(!empty($banner->path_to_image)) {{ $banner->path_to_image }}  @else {{ asset('image_user/no_image.png') }} @endif" width="100%" height="auto" id="imgBanner">
	  			<button type="button" class="btn btn-info btn-block" id="choice_image">Chọn ảnh</button>
				<input type="hidden" class="form-control" name="path_to_image" id="path_to_image" value="{{ $banner->path_to_image }}">
			</div>
	  		<div class="col-sm-6">
				<div class="form-group">
		  			<label>Tiêu đề</label>
		  			<input type="text" class="form-control" name="title" value="{{ $banner->title }}">
		  		</div>
		  		<div class="form-group">
		  			<label>Thông tin</label>
		  			<input type="text" class="form-control" name="information" value="{{ $banner->information }}">
		  		</div>
			</div>
	  	</div>
	  	
	  	<div class="panel-footer">
	  		<button type="submit" class="btn btn-success"><span class="icon-repeat"></span> Cập nhật</button>
	  		<a href="{{ route('indexBannerSlide') }}" title=""><button type="button" class="btn btn-default"><span class="icon-caret-left"></span> Quay lại</button></a>
	  	</div>
	</div>
</form>
<script>
	$(document).ready(function(){
		$("#choice_image").click(function(){
			selectFileWithCKFinder( 'path_to_image' );
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
					$("#imgBanner").attr('src',$("#path_to_image").val());
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( elementId );
					output.value = evt.data.resizedUrl;
					$("#imgBanner").attr('src',$("#path_to_image").val());
				} );
			}
		} );
	}
</script>
@endsection