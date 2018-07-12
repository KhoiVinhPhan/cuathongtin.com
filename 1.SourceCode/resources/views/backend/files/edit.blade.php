@extends('layouts.backend.app')

@section('content')
<form id="formFileEdit" method="POST" action="{{ route('updateFile') }}">
	<input name="_token" type="hidden" value="{{ csrf_token() }}">
	<input name="_method" type="hidden" value="PUT">
	<input name="file_id" type="hidden" value="{{$file->file_id}}">
	<div class="panel panel-primary">
	  	<div class="panel-heading">Edit file</div>
	  	<div class="panel-body">
	  		<div class="form-group">
	  			<label>Tiêu đề</label>
	  			<input type="text" class="form-control" value="{{$file->title}}" name="title">
	  		</div>
	  		<div class="form-group">
		         <label>Nội dung</label>
		         <textarea name="content" class="form-control" id="editor" value="{{$file->content}}">{{$file->content}}</textarea>
			</div> 
	  	</div>
	</div>
	<button type="button" class="btn-primary btn" id="btnSave">Lưu</button>
</form>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('editor'); </script>
<script>
	$(document).ready(function(){
		$("#btnSave").click(function(){
			for (instance in CKEDITOR.instances) {
		        CKEDITOR.instances[instance].updateElement();
		    }
			var data = $("#formFileEdit").serialize();
			$.ajax({
				type 	: 'PUT',
				url		: '/manager/file/update',
				data 	: data,
				success	: function(result){
					alert('tc');
				},
				error 	: function(error){
					alert('loi');
				}
			});
		});
	});
</script>
@endsection