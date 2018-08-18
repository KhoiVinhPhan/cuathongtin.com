@extends('layouts.backend.app')
@section('content')
<form action="{{ route('deletePosts') }}" method="POST" accept-charset="utf-8" id="formDeletePost">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="POST">
	<div class="panel panel-primary form">
	  	<div class="panel-heading">Quản lý danh sách tất cả bài viết ({{ count($data) }})</div>
	  	<div class="panel-body">
			<div class="col-sm-12">
				<button disabled="" class="btn btn-danger btn-sm delete-row" type="submit"><span class="icon icon-trash"></span> Xóa</button>
				<table class="table table-bordered" id="table">
				    <thead>
				      	<tr>
				      		<th style="width:5%"><input type="checkbox" id="select_all"></th>
					        <th style="width:5%">STT</th>
					        <th style="width:5%">Hình ảnh</th>
					        <th style="width:35%">Tiêu đề</th>
					        <th style="width:15%">Người đăng</th>
					        <th style="width:15%">Trạng thái</th>
					        <th style="width:10%">Ngày đăng</th>
					        <th style="width:10%">Hành động</th>
				      	</tr>
				    </thead>
				    <tbody>
				    	@php($i=0)
				    	@foreach($data as $item)
				    		@php($i++)
			    			<tr>
			    				<td align="center"><input class="checkbox" type="checkbox" value="{{ $item->post_id }}" name="checkbox[]"></td>
					        	<td align="center">{{ $i }}</td>
					        	<td align="center"><img src="@if(empty($item->path_to_image)) {{ asset('image_user/no_image.png') }} @else {{ $item->path_to_image }} @endif" width="70px" height="auto"></td>
					        	<td>{{ $item->title }}</td>
					        	<td align="center">{{ $item->nameUserMaked }}</td>
					        	<td>
					        		<div class="form-group">
									  	<select class="form-control input-sm" onchange="changeStatus(<?php echo $item->post_id; ?>)" id="<?php echo "status".$item->post_id; ?>">
										    <option <?php if($item->status == 1) echo "selected"; ?> value="1">Công khai</option>
										    <option <?php if($item->status == 2) echo "selected"; ?> value="2">Bản nháp</option>
									  	</select>
									</div>
					        	</td>
					        	<td align="center">{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
					        	<td>
					        		<a href="{{ route('editPostIsAdmin', ['post_id' => $item->post_id]) }}" title=""><button type="button" class="btn btn-info btn-xs btn-block"><span class="icon-edit"></span> Chỉnh</button></a>
					        	</td>
					      	</tr>
					    @endforeach
				    </tbody>
				</table>
			</div>
	  	</div>
	  	<div class="panel-footer">
	  		
	  	</div>
	</div>
</form>
<script>
	$(document).ready(function() {
		//Select all checkbox
		$("#select_all").change(function(){
			var checkboxes = $(this).closest('.form').find(':checkbox');
    		checkboxes.prop('checked', $(this).is(':checked'));
		});

		//Show-hide button delete all
		$('.checkbox').change(function(){
			var dem = 0;
			$('#table tbody').find('input[name="checkbox[]"]').each(function(){
				if($(this).is(":checked")){
					dem++;
				}
            });
            if(dem>0){
            	$('.delete-row').removeAttr('disabled');
            	$('#select_all').attr('checked', '');
            }else{
            	$('.delete-row').attr('disabled', '');
            	$('#select_all').removeAttr('checked');
            }
		});

		//Check box all
		$("#select_all").change(function(){
			var checkboxes = $(this).closest('form').find(':checkbox');
    		checkboxes.prop('checked', $(this).is(':checked'));
    		var dem = 0;
			$('#table tbody').find('input[name="checkbox[]"]').each(function(){
				if($(this).is(":checked")){
					dem++;
				}
            });

            if(dem>0){
            	$('.delete-row').removeAttr('disabled');
            }else{
            	$('.delete-row').attr('disabled', '');
            }
		});

		//Format datatable
		$('#table').DataTable({
			// "pagingType": "full_numbers",
			"searching"		: true,
			"lengthChange"	: true,
			"bInfo"			: true,
			"pageLength"	: 10,
			"bPaginate"		: true,
			"language": {
	            "oPaginate": {
					"sPrevious"	: "&laquo;",
					"sNext"		: "&raquo;",
				},
	            "lengthMenu"	: "Thể hiện _MENU_ bản ghi cho mỗi trang",
	            "zeroRecords"	: "Không tìm thấy dữ liệu",
	            "info"			: "Danh sách: _START_ ~ _END_ của _MAX_ dữ liệu",
	            "infoEmpty"		: "Không có dữ liệu",
	            "infoFiltered"	: "(được lọc từ _MAX_ bản ghi)",
	            "search"		: "Tìm kiếm:"
		    },
			drawCallback: function(){
				
            }
		});

	});

	//Change status post
	function changeStatus(post_id){
		var status = $("#status"+post_id+" option:selected").val();
		data = {
			post_id: post_id,
			status: status
		};
		$.ajax({
			type: "POST",
			url: "/manager/posts/change-status-post",
			data: {'data': data, '_token': '{{ csrf_token() }}'},
			success: function(result){
				console.log(result);
				toastr.success('Thay đổi trạng thái bài viết thành công');
			},
			error: function(result){
				console.log(result);
				toastr.error('Thay đổi không thành công');
			}
		});
	}
</script>
@endsection