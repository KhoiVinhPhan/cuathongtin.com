@extends('layouts.backend.app')
@section('content')
<div class="panel panel-primary">
  	<div class="panel-heading">Banner</div>
  	<div class="panel-body">
		<a href="" title="Thêm mới"><button type="button" class="btn btn-success btn-sm"><span class="icon-plus"></span> Thêm mới</button></a>
		<button type="" class="btn btn-danger btn-sm">Xóa nhiều</button>
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
    			<tr>
    				<td align="center"></td>
		        	<td align="center"></td>
		        	<td></td>
		        	<td></td>
		        	<td></td>
		      	</tr>
		    </tbody>
		</table>
  	</div>
  	<div class="panel-footer">
  		
  	</div>
</div>
@endsection