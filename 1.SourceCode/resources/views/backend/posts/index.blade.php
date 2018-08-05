@extends('layouts.backend.app')
@section('content')
<div class="panel panel-primary form">
  	<div class="panel-heading">Bài viết</div>
  	<div class="panel-body">
		<a href="{{ route('createPosts') }}" title="Thêm mới"><button type="button" class="btn btn-success btn-sm"><span class="icon-plus"></span> Thêm mới</button></a>
  		<table class="table table-bordered" id="table">
		    <thead>
		      	<tr>
		      		<th style="width:5%"><input type="checkbox" id="select_all_banner"></th>
			        <th style="width:5%">STT</th>
			        <th style="width:10%">Hình ảnh</th>
			        <th style="width:35%">Tiêu đề</th>
			        <th style="width:35%">Thông tin</th>
			        <th style="width:10%">Hành động</th>
		      	</tr>
		    </thead>
		    <tbody>
	    			<tr>
	    				<td align="center"><input type="checkbox" value="" name="checkboxUser[]"></td>
			        	<td align="center"></td>
			        	<td></td>
			        	<td></td>
			        	<td></td>
			        	<td>
			        		<a href="" title=""><button type="button" class="btn btn-info btn-xs btn-block"><span class="icon-edit"></span> Chỉnh</button></a>
			        		<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href=""><button type="button" class="btn btn-danger btn-xs btn-block"><span class="icon-trash"></span> Xóa</button></a>
			        	</td>
			      	</tr>
		    </tbody>
		</table>
  	</div>
  	<div class="panel-footer">
  		
  	</div>
</div>

@endsection