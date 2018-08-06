@extends('layouts.backend.app')
@section('content')
<div class="panel panel-primary form">
  	<div class="panel-heading">Thêm mới</div>
  	<div class="panel-body">
		<div class="col-sm-9">
			<div class="form-group">
	  			<label>Tiêu đề <span style="color: red">*</span></label>
	  			<input type="text" class="form-control" name="title">
	  		</div>
	  		<div class="form-group">
		         <label>Nội dung</label>
		         <textarea name="content" class="form-control" id="editor"></textarea>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel panel-default">
			  	<div class="panel-heading">Chức năng</div>
			  	<div class="panel-body">
			  		<button type="button" class="btn btn-success btn-sm">Đăng bài viết</button>
			  		<button type="button" class="btn btn-default btn-sm">Lưu nháp</button>
			  	</div>
			</div>

			<div class="panel panel-default">
			  	<div class="panel-heading"><span class="icon-list-ul"></span> Chuyên mục</div>
			  	<div class="panel-body">
			  		@foreach($category_news as $item)
				  		<div class="checkbox">
						  	<label><input type="checkbox" value="{{ $item->category_new_id }}">{{ $item->name }}</label>
						</div>
					@endforeach
					<a href="javascrip:;" title="Thêm" id="addCategory">Thêm chuyên mục</a>
					<div class="input-group" style="display: none" id="inputCategory">
			    		<input type="text" class="form-control" placeholder="Nhập chuyên mục">
				    	<div class="input-group-btn">
					      	<button class="btn btn-info" type="submit">
					        	<i class="icon icon-plus"></i>
					      	</button>
				    	</div>
				  	</div>
			  	</div>
			</div>

			<div class="panel panel-default">
			  	<div class="panel-heading"><span class="icon-list-ul"></span> Khu vực</div>
			  	<div class="panel-body">
			  		<div class="checkbox">
					  	<label><input type="checkbox" value="">Option 1</label>
					</div>
					<div class="checkbox">
					  	<label><input type="checkbox" value="">Option 1</label>
					</div>
					<div class="checkbox">
					  	<label><input type="checkbox" value="">Option 1</label>
					</div>
					<div class="checkbox">
					  	<label><input type="checkbox" value="">Option 1</label>
					</div>
			  	</div>
			</div>

		</div>
  	</div>
  	<div class="panel-footer">
  		<a href="{{ route('indexPosts') }}" title=""><button type="button" class="btn btn-default"><span class="icon-caret-left"></span> Quay lại</button></a>
  	</div>
</div>
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
		$('#addCategory').click(function(){
			$('#inputCategory').toggle();;
		});
	});
</script>
@endsection