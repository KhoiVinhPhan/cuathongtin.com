@extends('layouts.backend.app')
@section('content')
<div class="panel panel-primary form">
  	<div class="panel-heading">Banner</div>
  	<div class="panel-body">
		<a href="{{ route('createBannerSlide') }}" title="Thêm mới"><button type="button" class="btn btn-success btn-sm"><span class="icon-plus"></span> Thêm mới</button></a>
  		<table class="table table-bordered" id="table">
		    <thead>
		      	<tr>
		      		<th><input type="checkbox" id="select_all_banner"></th>
			        <th>STT</th>
			        <th style="width:100px">Hình ảnh</th>
			        <th>Tiêu đề</th>
			        <th>Thông tin</th>
			        <th>Hành động</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	@php($i=0)
		    	@foreach($data as $item)
		    	@php($i++)
	    			<tr>
	    				<td align="center"><input type="checkbox" value="{{ $item->banner_slide_id }}" name="checkboxUser[]"></td>
			        	<td align="center">{{$i}}</td>
			        	<td>
			        		<img src="@if(!empty($item->path_to_image)) {{ $item->path_to_image }} @else {{ asset('image_user/no_image.png') }} @endif" width="100px" height="auto">
			        	</td>
			        	<td>{{ $item->title }}</td>
			        	<td>{{ $item->information }}</td>
			        	<td>
			        		<a href="{{ route('editBannerSlide', ['banner_slide_id'=>$item->banner_slide_id]) }}" title=""><button type="button" class="btn btn-info btn-xs"><span class="icon-edit"></span> Chỉnh</button></a>
			        		<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{ route('deleteBannerSlide', ['banner_slide_id'=>$item->banner_slide_id]) }}"><button type="button" class="btn btn-danger btn-xs"><span class="icon-trash"></span> Xóa</button></a>
			        	</td>
			      	</tr>
		      	@endforeach
		    </tbody>
		</table>
  	</div>
  	<div class="panel-footer">
  		
  	</div>
</div>
<script>
	$(document).ready(function() {
		$("#select_all_banner").change(function(){
			var checkboxes = $(this).closest('.form').find(':checkbox');
    		checkboxes.prop('checked', $(this).is(':checked'));
		});
	});
</script>
@endsection