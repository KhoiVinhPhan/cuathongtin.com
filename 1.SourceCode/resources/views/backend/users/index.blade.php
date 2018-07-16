@extends('layouts.backend.app')
@section('content')
<style type="text/css" media="screen">
	#file_avatar_user {
	 	width: 0px;
	 	height: 0px;
	 	overflow: hidden;
	 	
	}
	#img_avatar_user{
		cursor: pointer;
	}
	.overlay {
	  	position: absolute; 
	  	bottom: 0; 
	  	background: rgb(0, 0, 0);
	  	background: rgba(0, 0, 0, 0.5);
	  	color: #f1f1f1; 
	  	width: 100%;
	  	transition: .5s ease;
	  	opacity:0;
	  	color: white;
	  	font-size: 10px;
	  	padding: 10px;
	  	text-align: center;
	}
	.overlayImage {
	  	position: relative;
	  	width: 100%;
	}
	.overlayImage:hover .overlay {
	  opacity: 1;
	}
</style>
<form action="{{ route('updateUser') }}" method="POST" id="formUserUpdate" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="POST">

	<div class="panel panel-primary">
      	<div class="panel-heading">Panel with panel-primary class</div>
      	<div class="panel-body">
      		<div class="col-sm-2">
				<div class="overlayImage">
					<img id="img_avatar_user" src="{{ asset('image_user') }}/<?php if(!empty($image_user)){echo $image_user->filename;}else{echo "no_image.png";} ?>" style="width: 100%; height: auto;" class="thumbnail">
					<div class="overlay">Thay đổi</div>
				</div>
				<input name="file_avatar_user" type="file" id="file_avatar_user" />
				<p>Ngày tạo: {{ date('d-m-Y', strtotime($user->created_at)) }}</p>
			</div>
			<div class="col-sm-5">
				<div class="form-group">
					<label>Email</label>
					<input readonly type="text" class="form-control" value="{{$user->email}}" name="emailUser">
				</div>
				<div class="form-group">
					<label>Tên</label>
					<input type="text" class="form-control" value="{{$user->name}}" name="nameUser">
				</div>
			</div>
			<div class="span5">
				
			</div>
      	</div>
      	<div class="panel-footer">
      		<button type="submit" class="btn btn-success" id="btnUpdate">Cập nhật</button>
      	</div>
    </div>
</form>
<script>
	$(document).ready(function(){
		// Change avatar
        $("#img_avatar_user").click(function(){
            $('#file_avatar_user').trigger('click'); 
            
        });
        $("#file_avatar_user").change(function(){
        	if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    if(validImage("#file_avatar_user"))
                    {
                        $('#img_avatar_user').attr('src', e.target.result);
                    }else{
                    	toastr.error('Tệp không đúng định dạng');
                        $('#img_avatar_user').attr('src', "{{ url('image_user/image_error.png')}}");
                    }
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

        //Save user
        $('#formUserUpdate').on('submit',(function(e) {
	        e.preventDefault();
	        var formData = new FormData(this);
	        $.ajax({
	            type:'POST',
	           	url: '/manager/user/update',
	            data:formData,
	            cache:false,
	            contentType: false,
	            processData: false,
	            success:function(data){
	                toastr.success('Lưu thành công')
	            },
	            error: function(data){
	                toastr.error('Lỗi không lưu được')
	            }
	        });
	    }));

	});	

	// Valid Image
	function validImage(file_id)
    {
        var fileExtension	= ['jpg','jpeg', 'png'];
        var valid 			= true;
        var msg 			= "";	

        if($(file_id).val() == ''){
            valid = false;
        }else{
            var fileName = $(file_id).val();
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1).toLowerCase();
            if ($.inArray(fileNameExt, fileExtension) == -1) {
                valid = false;
            }
        }

        return valid //true or false
    }
</script>
@endsection