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
</style>
<form action="{{ route('updateUser') }}" method="POST" id="formUserUpdate" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="PUT">
	<div class="">
		<div class="col-sm-2">
			<img id="img_avatar_user" src="{{ asset('image_user/no_image.png') }}" style="width: 100%; height: auto;" class="thumbnail">
			<input name="file_avatar_user" type="file" id="file_avatar_user" />
		</div>
		<div class="col-sm-5">
			<div class="form-group">
				<label>Tên</label>
				<input type="text" class="form-control" value="{{$user->name}}" name="nameUser">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" class="form-control" value="{{$user->email}}" name="emailUser">
			</div>
		</div>
		<div class="col-sm-5">
			
		</div>
	</div>
	<div class="col-sm-12">
		<button type="button" class="btn btn-success pull-right" id="btnUpdate">Cập nhật</button>
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
                        $('#img_avatar_user').attr('src', "{{ url('image_user/no_image.png')}}");
                    }
                }

                reader.readAsDataURL(this.files[0]);
            }
        });

        //Save user
        $("#btnUpdate").click(function(){
        	var formValid = $("#formUserUpdate").valid();
        	if(formValid){
        		var data = $("#formUserUpdate").serialize();
        		// var formData = new FormData($("#formUserUpdate")[0]);

        		var formData = new FormData();
		        formData.append('action', 'ajax_handler_import');
		        formData.append('_ajax_nonce', importNonce);

		        // Issue occures here. PHP gets a string '[object FormData]'.
		        var importFiles = $('#formUserUpdate')[0].files;
		        formData.append('uploadFiles', importFiles);
        		$.ajax({
        			type: 'PUT',
        			url: '/manager/user/update',
        			data: formData,
        			success: function(result){
        				console.log(result);
        			}
        		});
        	}
        });
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