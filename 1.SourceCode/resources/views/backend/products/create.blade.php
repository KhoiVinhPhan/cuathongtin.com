@extends('layouts.backend.app')
@section('content')
<form action="" method="POST" accept-charset="utf-8" id="formCreateProduct">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="POST">
	<div class="panel panel-primary form">
	  	<div class="panel-heading">Thêm mới sản phẩm</div>
	  	<div class="panel-body">
			<div>
				<div class="col-sm-9">
					<div class="form-group">
			  			<label>Tên sản phẩm <span style="color: red">*</span></label>
			  			<input type="text" class="form-control" name="name">
			  		</div>

					<div>
				    	<div class="group-tabs">
					      	<ul class="nav nav-tabs" role="tablist">
						        <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Mô tả</a></li>
						        <li role="presentation"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Chi tiết</a></li>
					      	</ul>
					      	<div class="tab-content">
						        <div role="tabpanel" class="tab-pane active" id="description">
						        	<div class="form-group">
								         <textarea name="description" class="form-control" rows="10"></textarea>
									</div>
						    	</div>
						        <div role="tabpanel" class="tab-pane" id="details">
						        	<div class="form-group">
								         <textarea name="details" class="form-control" id="editor"></textarea>
									</div>
						        </div>
					      	</div>
				    	</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="panel panel-default">
					  	<div class="panel-heading"><span class="icon-bookmark"></span> Thông tin sản phẩm</div>
					  	<div class="panel-body">
					  		<p><span class="icon-user"></span> Người đăng: {{ Auth::user()->name }}</p>
					  		<p><span class="icon-calendar"></span> Ngày đăng: {{ date('d-m-Y') }}</p>
					  		<p><span class="icon-calendar"></span> Ngày cập nhật: {{ date('d-m-Y') }}</p>
					  		<p><span class="icon-star"></span> Trạng thái: Chưa xác định</p>
					  	</div>
					  	<div class="panel-footer">
					  		<button name="save" id="btnSave" value="save" type="submit" class="btn btn-success btn-sm"><span class="icon icon-plus"></span> Đăng bài viết</button>
					  		<button name="save" id="btnSaveDraft" value="save-draft" type="submit" class="btn btn-default btn-sm"><span class="icon-save"></span> Lưu nháp</button>
					  	</div>
					</div>

					<div class="form-group">
			  			<label>Giá sản phẩm <span style="color: red">*</span></label>
			  			<input type="text" class="form-control" name="name">
			  		</div>

			  		<div class="input-group">
				    	<span class="input-group-addon"><i class="glyphicon glyphicon-sort-by-order"></i></span>
				    	<input id="" type="text" class="form-control" name="" placeholder="% giảm giá">
				  	</div>

					<div>
						<br>
						<p><span class="icon icon-picture"></span> Ảnh đại diện</p>
						<img src="{{ asset('image_user/no_image.png') }}" alt="" width="100%" height="auto" id="imgImageTitle">
						<button type="button" class="btn btn-info btn-block btn-sm" id="choice_image">Chọn ảnh</button>
						<input type="hidden" class="form-control" name="path_to_image" id="path_to_image">
					</div>
				</div>
			</div>
			<div>
				
			</div>
	  	</div>
	  	<div class="panel-footer">
	  		<a href="}" title=""><button type="button" class="btn btn-default"><span class="icon-caret-left"></span> Quay lại</button></a>
	  	</div>
	</div>
</form>
<!-- CKEDITOR -->
<script>
	CKEDITOR.replace('editor', {
        height: "300px",
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
		//Choice image
		$("#choice_image").click(function(){
			selectFileWithCKFinder( 'path_to_image' );
		});
	});

	//Function choice image
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
					$("#imgImageTitle").attr('src',$("#path_to_image").val());
				} );

				finder.on( 'file:choose:resizedImage', function( evt ) {
					var output = document.getElementById( elementId );
					output.value = evt.data.resizedUrl;
					$("#imgImageTitle").attr('src',$("#path_to_image").val());
				} );
			}
		} );
	}
</script>
@endsection