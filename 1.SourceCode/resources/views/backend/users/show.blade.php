@extends('layouts.backend.app')
@section('breadcrumb')
<a href="{{ route('showUser') }}" class="tip-bottom">Danh sách user</a>
@endsection
@section('content')
<form action="{{ route('deleteChoiceUser') }}" method="POST" accept-charset="utf-8" id="formShowUser">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="POST">
	<div class="panel panel-primary">
	  	<div class="panel-heading">Danh sách user </div>
	  	<div class="panel-body">
	  		<a href="{{ route('createUser') }}" title="Thêm mới"><button type="button" class="btn btn-success btn-sm"><span class="icon-plus"></span> Thêm mới</button></a>
			<button type="submit" class="btn btn-danger btn-sm">Xóa nhiều</button>
	  		<table class="table table-bordered" id="table">
			    <thead>
			      	<tr>
			      		<th><input type="checkbox" id="select_all_user"></th>
				        <th>STT</th>
				        <th>Tên</th>
				        <th>Email</th>
				        <th>Hành động</th>
			      	</tr>
			    </thead>
			    <tbody>
			    	@if(!empty($users))
			    		@php($i=0)
			    		@foreach($users as $item)
			    		@php($i++)
			    			<tr>
			    				<td align="center">
			    					<input type="checkbox" value="{{ $item->user_id }}" name="checkboxUser[]">
			    				</td>
					        	<td align="center">{{$i}}</td>
					        	<td style="font-weight: bold; color: #27A9E3" onclick="show(<?php echo $item->user_id; ?>)" id="<?php echo "hide".$item->user_id ?>">{{$item->name}}<span class="pull-right icon-fullscreen"></span></td>
					        	<td>{{$item->email}}</td>
					        	<td>
					        		<a href="{{ route('editUser', ['user_id'=>$item->user_id]) }}" title=""><button type="button" class="btn btn-info btn-xs"><span class="icon-edit"></span> Chỉnh</button></a>
				        			<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{ route('deleteUser', ['user_id'=>$item->user_id]) }}"><button type="button" class="btn btn-danger btn-xs"><span class="icon-trash"></span> Xóa</button></a>
					        	</td>
					      	</tr>
					      	<tr style="display: none" id="<?php echo "show".$item->user_id ?>">
					        	<td colspan="5">
					        		<div class="col-sm-2">
					        			<img src="{{ asset('image_user') }}/<?php if(!empty($item->filename)){echo $item->filename;}else{echo "no_image.png";} ?>" style="width: 100%; height: auto;" class="thumbnail">
									  	<select class="form-control" onchange="changePermission(<?php echo $item->user_id; ?>)" id="<?php echo "permission".$item->user_id; ?>">
									  		@foreach($permissions as $permission)
									  			<option <?php if($item->user_permission_id == $permission->user_permission_id) echo "selected"; ?> value="{{$permission->user_permission_id}}">{{$permission->name_permission}}</option>}
									  			option
									  		@endforeach
									  	</select>
					        		</div>
					        		<div class="col-sm-5">
					        			<p><span class="icon-user"></span> Giới tính: 
					        				<?php 
					        					if($item->gender == 1) 
					        						echo "Nam";
					        					else if($item->gender == 2)
					        						echo "Nữ";
					        					else if($item->gender == 3)
					        						echo "Khác";
					        				?>
					        			</p>
						        		<p><span class="icon-home"></span> Địa chỉ: {{$item->address}}</p>
						        		<p><span class="icon-calendar"></span> Ngày sinh: {{$item->birthday}}</p>
						        		<p><span class="icon-calendar"></span> Ngày tạo: {{ date('d-m-yy', strtotime($item->created_at)) }}</p>
						        		<p onclick="showChangePassword(<?php echo $item->user_id; ?>)" id="<?php echo "hidePassword".$item->user_id; ?>"><span class="icon-lock"></span><a href="javascript:;" style="color: red"> Thay đổi mật khẩu</a></p>
					        		</div>
					        		<div class="col-sm-5">
					        			<p><span class="icon-phone"></span> Điện thoại: {{$item->phone}}</p>
					        			<p><span class="icon-facebook-sign"></span> Facebook: {{$item->facebook}}</p>
					        			<p><span class=" icon-file"></span> Thông tin: {{$item->information}}</p>
					        		</div>
					        	</td>
					      	</tr>
					      	<tr style="display: none" id="<?php echo "showPassword".$item->user_id; ?>">
					      		<td colspan="5">
					      			<div class="form-inline">
									  	<div class="form-group">
									    	<label>Email:</label>
									    	<input readonly type="email" class="form-control" value="{{$item->email}}">
									  	</div>
									  	<div class="form-group">
									    	<label for="pwd">Nhập mật khẩu:</label>
									    	<input type="password" class="form-control" id="<?php echo "changePassword".$item->user_id ?>">
									    	<span class="<?php echo "error_password".$item->user_id; ?>"></span>
									  	</div>
									  <button type="button" class="btn btn-success" onclick="btnChangePassword(<?php echo $item->user_id; ?>)">Thay đổi</button>
									</div>
					      		</td>
					      	</tr>
			    		@endforeach
			    	@endif
			    </tbody>
			</table>
	  	</div>
	</div>
</form>

<script>
	//Show hide user information
	function show(user_id){
		$("#show"+user_id).attr('style', 'display: show');
		$("#hide"+user_id).attr('onclick', 'hide('+user_id+')');
		$("#hide"+user_id+" span").attr('class', 'pull-right icon-resize-small');
	};
	function hide(user_id){
		$("#show"+user_id).attr('style', 'display: none');
		$("#hide"+user_id).attr('onclick', 'show('+user_id+')');
		$("#showPassword"+user_id).attr('style', 'display: none');
		$("#hide"+user_id+" span").attr('class', 'pull-right icon-fullscreen');
	};

	//Show hide change password
	function showChangePassword(user_id){
		$("#showPassword"+user_id).attr('style', 'display: show');
		$("#hidePassword"+user_id).attr('onclick', 'hideChangePassword('+user_id+')');
	}
	function hideChangePassword(user_id){
		$("#showPassword"+user_id).attr('style', 'display: none');
		$("#hidePassword"+user_id).attr('onclick', 'showChangePassword('+user_id+')');
	}

	//Change permission
	function changePermission(user_id){
		var permission = $("#permission"+user_id+" option:selected").val();
		data = {
				permission	: permission, 
				user_id 	: user_id, 
			};
		$.ajax({
			type: 'POST',
			url: '/manager/user/change-permission',
			data: {'data':data, '_token': '{{ csrf_token() }}'},
			success: function(result){
				console.log(result);
				if(result == 'success')
					toastr.success('Thay đổi phân quyền thành công')
				else
					toastr.error('Thay đổi phân quyền không thành công')
			},
			error: function(result){
				console.log(result);
				toastr.error('Lỗi hệ thống khi lưu')
			}
		})
	}

	//Change password
	function btnChangePassword(user_id){
		var password = $("#changePassword"+user_id).val();
		$(".error_password"+user_id).html('');
		if(password.length < 6){
			$(".error_password"+user_id).append('<span style="color: red">Không dưới 6 ký tự</span>');
			return false;
		}
		data = {
			user_id 	: user_id,
			password 	: password,
		};
		$.ajax({
			type: "POST",
			url: "/manager/user/change-password",
			data:  {'data': data, '_token': '{{ csrf_token() }}'},
			success: function(result){
				console.log(result);
				$("#showPassword"+user_id).attr('style', 'display: none');
				$("#hidePassword"+user_id).attr('onclick', 'showChangePassword('+user_id+')');
				$("#changePassword"+user_id).val('');
				if(result == 'success')
					toastr.success('Thay đổi mật khẩu thành công')
				else
					toastr.error('Thay đổi không thành công')
			},
			error: function(result){
				console.log(result);
				toastr.error('Lỗi hệ thống khi lưu')
			}
		});
	}

	$(document).ready(function() {
		$("#select_all_user").change(function(){
			var checkboxes = $(this).closest('form').find(':checkbox');
    		checkboxes.prop('checked', $(this).is(':checked'));
		});
	});
</script>	
@endsection