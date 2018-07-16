@extends('layouts.backend.app')

@section('content')
<form id="formFileCreate" method="POST" action="{{ route('storeFile') }}">
	<input name="_token" type="hidden" value="{{ csrf_token() }}">
	<input name="_method" type="hidden" value="POST">
	<div class="panel panel-primary">
	  	<div class="panel-heading">Thêm mới dữ liệu</div>
	  	<div class="panel-body">
	  		<div class="form-group">
	  			<label>Tiêu đề</label>
	  			<input type="text" class="form-control" name="title">
	  		</div>
	  		<div class="form-group">
		         <label>Nội dung</label>
		         <textarea name="content" class="form-control" id="editor"></textarea>
			</div>
	  	</div>	
	  	<div class="panel-footer">
	  		<button type="submit" class="btn btn-success">Tạo</button>
	  	</div>  	
	</div>
</form>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
	CKEDITOR.replace('editor', {
        height: "500px"
	}); 
</script>
@endsection