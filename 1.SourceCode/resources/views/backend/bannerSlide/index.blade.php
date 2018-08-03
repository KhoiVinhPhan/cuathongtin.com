@extends('layouts.backend.app')
@section('content')
<div class="panel panel-primary form">
  	<div class="panel-heading">Banner</div>
  	<div class="panel-body">
		<a href="{{ route('createBannerSlide') }}" title="Thêm mới"><button type="button" class="btn btn-success btn-sm"><span class="icon-plus"></span> Thêm mới</button></a>
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
		    	@php($i=0)
		    	@foreach($data as $item)
		    	@php($i++)
	    			<tr>
	    				<td align="center"><input type="checkbox" value="{{ $item->banner_slide_id }}" name="checkboxUser[]"></td>
			        	<td align="center">{{$i}}</td>
			        	<td>
			        		<img src="@if(!empty($item->path_to_image)) {{ $item->path_to_image }} @else {{ asset('image_user/no_image.png') }} @endif" width="100%" height="auto">
			        	</td>
			        	<td>{{ $item->title }}</td>
			        	<td>{{ $item->information }}</td>
			        	<td>
			        		<a href="{{ route('editBannerSlide', ['banner_slide_id'=>$item->banner_slide_id]) }}" title=""><button type="button" class="btn btn-info btn-xs btn-block"><span class="icon-edit"></span> Chỉnh</button></a>
			        		<a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{ route('deleteBannerSlide', ['banner_slide_id'=>$item->banner_slide_id]) }}"><button type="button" class="btn btn-danger btn-xs btn-block"><span class="icon-trash"></span> Xóa</button></a>
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