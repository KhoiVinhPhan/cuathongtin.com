@extends('layouts.backend.app')
@section('breadcrumb')
	<a href="{{ route('showUser') }}" class="tip-bottom">Danh sách user</a>
	<a href="{{ route('trashUser') }}" class="tip-bottom">Danh sách user đã xóa</a>
@endsection
@section('content')
<div class="panel panel-primary">
  	<div class="panel-heading">Thùng rác</div>
  	<div class="panel-body">
  		<table class="table table-bordered">
  			<thead>
  				<tr>
  					<th>#</th>
  					<th>Tên</th>
  					<th>Email</th>
  					<th>Hành động</th>
  				</tr>
  			</thead>
  			<tbody>
  				@if(!empty($userTrash))
  					@php($i=0)
		    		@foreach($userTrash as $item)
		    		@php($i++)
		    			<tr>
		  					<td>{{$i}}</td>
		  					<td>{{ $item->name }}</td>
		  					<td>{{ $item->email }}</td>
		  					<td>
		  						<a  href="{{ route('restoreUser', ['user_id'=>$item->user_id]) }}"><button type="button" class="btn btn-info btn-sm"><span class="icon-refresh"></span> Khôi phục</button></a>
		  					</td>
		  				</tr>
		    		@endforeach
  				@endif
  			</tbody>
  		</table>
  	</div>
</div>
@endsection
