@extends('layouts.backend.app')

@section('content')
<div>
	<div class="col-sm-2">
		<img id="img_avatar_face" src="http://i.9mobi.vn/cf/images/2015/03/nkk/nhung-hinh-anh-dep-11.jpg" style="width: 100%; height: auto;" class="thumbnail">
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
		 // avatar
        $("#img_avatar_face").click(function(){
            
        });
	});	
</script>
@endsection