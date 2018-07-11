@extends('layouts.backend.app')

@section('content')
	<div class="panel panel-primary">
	  	<div class="panel-heading">Danh sách file</div>
	  	<div class="panel-body">
	  		<table class="table table-bordered" id="table">
			    <thead>
			      	<tr>
				        <th>#</th>
				        <th>Tiêu đề</th>
				        <th>Người tạo</th>
				        <th>Ngày tạo</th>
				        <th>Hành động</th>
			      	</tr>
			    </thead>
			    <tbody>
			    	@php($i = 0)
			    	@foreach($files as $item)
			    		@php($i++)
				      	<tr>
				        	<td>{{$i}}</td>
				        	<td>{{$item->title}}</td>
				        	<td>{{$item->nameUser}}</td>
				        	<td>{{$item->created_at}}</td>
				        	<td>
				        		<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button>
				        		<button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></button>
				        	</td>
				      	</tr>
			      	@endforeach
			    </tbody>
			  </table>
	  	</div>
	</div>
	<script>
		$(document).ready(function(){
			//format table
			$('#table').DataTable({
				"searching": true,
				"lengthChange": true,
				"bInfo": true,
				"pageLength": 10,
				"bPaginate": true,
				"language": {
		            "oPaginate": {
						"sPrevious": "&laquo;",
						"sNext": "&raquo;",
					},
		            "lengthMenu": "Thể hiện _MENU_ bản ghi cho mỗi trang",
		            "zeroRecords": "Không tìm thấy dữ liệu",
		            "info": "Danh sách: _START_ ~ _END_ của _MAX_ dữ liệu",
		            "infoEmpty": "Không có dữ liệu",
		            "infoFiltered": "(được lọc từ _MAX_ bản ghi)",
		            "search": "Tìm kiếm:"
			    }
			});

			
		});
	</script>
@endsection