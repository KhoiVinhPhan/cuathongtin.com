@extends('layouts.backend.app')

@section('content')
<form id="formFileEdit" method="POST" action="{{ route('updateFile') }}">
	<input name="_token" type="hidden" value="{{ csrf_token() }}">
	<input name="_method" type="hidden" value="PUT">
	<div class="panel panel-primary">
	  	<div class="panel-heading">Edit file</div>
	  	<div class="panel-body">
	  		<div class="form-group">
	  			<label>Tiêu đề</label>
	  			<input type="text" class="form-control" value="{{$file->title}}">
	  		</div>
	  		<div class="form-group">
		         <label>Nội dung</label>
		         <textarea name="txtContent" class="form-control " id="editor">{{$file->content}}</textarea>
			</div> 
	  	</div>
	</div>
	<button type="submit" class="btn-primary btn">Lưu</button>
</form>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script> CKEDITOR.replace('editor'); </script>
@endsection