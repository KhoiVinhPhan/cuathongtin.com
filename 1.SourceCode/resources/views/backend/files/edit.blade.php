@extends('layouts.backend.app')

@section('content')
<form id="formFileEdit" method="POST" action="{{ route('updateFile') }}">
	<input name="_token" type="hidden" value="{{ csrf_token() }}">
	<input name="_method" type="hidden" value="PUT">
	<input name="file_id" type="hidden" value="{{$file->file_id}}">
	<div class="panel panel-primary">
	  	<div class="panel-heading">Chỉnh sửa dữ liệu</div>
	  	<div class="panel-body">
	  		<div class="form-group">
	  			<label>Tiêu đề</label>
	  			<input type="text" class="form-control" value="{{$file->title}}" id="title" name="title">
	  		</div>
	  		<div class="form-group">
		         <label>Nội dung</label>
		         <textarea name="content" class="form-control" id="editor" value="{{$file->content}}">{{$file->content}}</textarea>
			</div>
			
	  	</div>
	  	<div class="panel-footer">
	  		<button type="button" class="btn btn-success" id="btnSave">Lưu</button>	
	  	</div>	  	
	</div>
</form>
<!-- CKEDITOR -->
<script>

	CKEDITOR.replace('editor', {
        height: "500px",
        filebrowserBrowseUrl: '{{ asset('ckfinder/ckfinder.html') }}',
        filebrowserImageBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Images') }}',
        filebrowserFlashBrowseUrl: '{{ asset('ckfinder/ckfinder.html?type=Flash') }}',
        filebrowserUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
        filebrowserImageUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
        filebrowserFlashUploadUrl: '{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
	});
	CKEDITOR.add         
</script>
<!-- END CKEDITOR -->
<script>
	$(document).ready(function(){
		//Save File
		$("#btnSave").click(function(){
			var length_title = $("#title").val().length;
			if(length_title > 200){
				toastr.error('Tiêu đề vượt quá 200 ký tự')
			}else{
				for (instance in CKEDITOR.instances) {
			        CKEDITOR.instances[instance].updateElement();
			    }
				var data = $("#formFileEdit").serialize();
				$.ajax({
					type 	: 'PUT',
					url		: '/manager/file/update',
					data 	: data,
					success	: function(result){
						toastr.success('Lưu thành công')
					},
					error 	: function(error){
						toastr.error('Lỗi không lưu được')
					}
				});
			}
		});

		//check session create
		var checkCreate = '<?php echo Session::get('checkCreate'); ?>';
		if(checkCreate == 'success'){
			toastr.success('Tạo mới thành công')
		}
	});
</script>
@endsection