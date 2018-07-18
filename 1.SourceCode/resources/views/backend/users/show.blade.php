@extends('layouts.backend.app')
@section('content')
<div class="panel panel-primary">
  	<div class="panel-heading">Danh sách user <a href="{{ route('createUser') }}" title="Thêm mới"><button type="button" class="btn btn-success btn-sm">Thêm mới</button></a></div>
  	<div class="panel-body">
  		<table class="table table-bordered" id="table">
		    <thead>
		      	<tr>
			        <th>#</th>
			        <th>Tên</th>
			        <th>Email</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	@if(!empty($users))
		    		@php($i=0)
		    		@foreach($users as $item)
		    		@php($i++)
		    			<tr>
				        	<td>{{$i}}</td>
				        	<td onclick="show(<?php echo $item->user_id; ?>)" id="<?php echo "hide".$item->user_id ?>">{{$item->name}}<span class="pull-right icon-fullscreen"></span></td>
				        	<td>{{$item->email}}</td>
				      	</tr>
				      	<tr style="display: none" id="<?php echo "show".$item->user_id ?>">
				        	<td colspan="3">
				        		<div class="col-sm-2">
				        			<img src="{{ asset('image_user') }}/<?php if(!empty($item->filename)){echo $item->filename;}else{echo "no_image.png";} ?>" style="width: 100%; height: auto;" class="thumbnail">
								  	<select class="form-control" onchange="changePermission(<?php echo $item->user_id; ?>)" id="<?php echo "permission".$item->user_id; ?>">
								  		@foreach($permissions as $permission)
								  			<option <?php if($item->user_permission_id == $permission->user_permission_id) echo "selected"; ?> value="{{$permission->user_permission_id}}">{{$permission->name_permission}}</option>}
								  			option
								  		@endforeach
								  	</select>
				        		</div>
				        		<div class="col-sm-4">
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
				        		</div>
				        		<div class="col-sm-4">
				        			<p><span class="icon-phone"></span> Điện thoại: {{$item->phone}}</p>
				        			<p><span class="icon-facebook-sign"></span> Facebook: {{$item->facebook}}</p>
				        			<p><span class=" icon-file"></span> Thông tin: {{$item->information}}</p>
				        		</div>
				        		<div class="col-sm-2">
				        			<button type="button" class="btn btn-danger btn-sm"><span class="icon-trash"></span> Xóa</button>
				        			<button type="button" class="btn btn-info btn-sm"><span class="icon-trash"></span> Chỉnh</button>
				        		</div>
				        	</td>
				      	</tr>
		    		@endforeach
		    	@endif
		    </tbody>
		  </table>
  	</div>
</div>
<script>
	//Show hide user information
	function show(id){
		$("#show"+id).attr('style', 'display: show');
		$("#hide"+id).attr('onclick', 'hide('+id+')');
	};
	function hide(id){
		$("#show"+id).attr('style', 'display: none');
		$("#hide"+id).attr('onclick', 'show('+id+')');
	};

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
					toastr.success('Lưu thành công')
				else
					toastr.error('Lưu không thành công')
			},
			error: function(result){
				console.log(result);
				toastr.error('Lỗi hệ thống khi lưu')
			}
		})
	}
</script>	
@endsection