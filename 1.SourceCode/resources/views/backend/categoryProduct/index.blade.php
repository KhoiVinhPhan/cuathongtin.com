@extends('layouts.backend.app')
@section('content')
<div class="panel panel-primary">
  	<div class="panel-heading">Danh mục sản phẩm</div>
  	<div class="panel-body">
  		<div class="col-sm-6">
  			<div class="input-group">
			    <input type="text" class="form-control" placeholder="Search">
			    <div class="input-group-btn">
			      	<button class="btn btn-default" type="submit">
			        	<i class="icon-remove"></i>
			      	</button>
			    </div>
		  	</div>
  		</div>
  		<div class="col-sm-6">
  			sub
  		</div>
  	</div>
  	<div class="panel-footer">
  		<button type="button" class="btn btn-success">Thêm mới</button>
  	</div>
</div>
@endsection