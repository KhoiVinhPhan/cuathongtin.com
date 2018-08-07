@extends('layouts.backend.app')
@section('content')
<div class="panel panel-primary form">
  	<div class="panel-heading">Chuyên mục</div>
  	<div class="panel-body">
		<div class="col-sm-4">
			<div class="form-group">
				<label>Tiêu đề <span style="color: red">*</span></label>
				<input type="text" name="title" class="form-control">
			</div>
			<div class="form-group">
				<label>Mô tả:</label>
				<textarea class="form-control" rows="5"></textarea>
			</div>
		</div>
		<div class="col-sm-8">
			<table class="table table-bordered" id="table">
			    <thead>
			      	<tr>
			      		<th style="width:5%"><input type="checkbox" id="select_all_banner"></th>
				        <th style="width:5%">STT</th>
				        <th style="width:20%">Tên</th>
				        <th style="width:35%">Mô tả</th>
				        <th style="width:10%">Hành động</th>
			      	</tr>
			    </thead>
			    <tbody>
			    	@php($i = 0)
					@foreach($category_news as $item)
						@php($i++)
		    			<tr>
		    				<td align="center"><input type="checkbox" value="" name="checkboxUser[]"></td>
				        	<td align="center">{{ $i }}</td>
				        	<td>{{ $item->name }}</td>
				        	<td></td>
				        	<td><a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href=""><button type="button" class="btn btn-danger btn-xs btn-block"><span class="icon-trash"></span> Xóa</button></a></td>
				      	</tr>
				    @endforeach
			    </tbody>
			</table>
		</div>	
  	</div>
  	<div class="panel-footer">
  		
  	</div>
</div>

@endsection