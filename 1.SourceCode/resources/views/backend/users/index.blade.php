@extends('layouts.backend.app')

@section('content')
<style type="text/css" media="screen">
	#uploadImage {
	 	width: 0px;
	 	height: 0px;
	 	overflow: hidden;
	}
</style>
<div>
	<div class="col-sm-2">
		<img id="img_avatar_face" src="{{ asset('image_user/no_image.png') }}" style="width: 100%; height: auto;" class="thumbnail">
		<input name="uploadImage" type="file" id="uploadImage" />
	</div>
	<div class="col-sm-5">
		<div class="form-group">
			<label>Tên</label>
			<input type="text" class="form-control" value="{{$user->name}}">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" class="form-control" value="{{$user->email}}">
		</div>
	</div>
	<div class="col-sm-5">
		
	</div>
</div>
<script>
	$(document).ready(function(){
		// Change avatar
        $("#img_avatar_face").click(function(){
            $('#uploadImage').trigger('click'); 
            
        });

        $("#uploadImage").change(function(){
        	var input = this;
		    var url = $(this).val();
		    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
		    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")){
		        var reader = new FileReader();
		        reader.onload = function (e) {
		           	$('#img_avatar_face').attr('src', e.target.result);
		        }
		       reader.readAsDataURL(input.files[0]);
		    }else{
		      	$('#img_avatar_face').attr('src', '/image_user/no_image.png');
		    }
        });
	});	
</script>
@endsection