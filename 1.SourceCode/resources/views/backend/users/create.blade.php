@extends('layouts.backend.app')
@section('content')
<form id="formCreateUser" method="POST" accept-charset="utf-8" action="{{ route('storeUser') }}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="POST">
	<div class="panel panel-primary">
	  	<div class="panel-heading">Tạo user</div>
	  	<div class="panel-body">
	  		<div>
	  			<div class="col-sm-3"></div>
	  			<div class="col-sm-6">
	  				@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
	  				<div class="form-group">
					    <label>Email:</label>
					    <input type="email" class="form-control" name="email">
					</div>
					<div class="form-group">
					    <label>Tên:</label>
					    <input type="text" class="form-control" name="name">
					</div>
					<div class="form-group">
						<select class="form-control" name="permission">
					  		@foreach($permissions as $permission)
					  			<option value="{{$permission->user_permission_id}}">{{$permission->name_permission}}</option>}
					  			option
					  		@endforeach
					  	</select>
					</div>
					<div class="form-group">
					    <label>Mật khẩu:</label>
					    <input type="password" class="form-control" name="password">
					</div>
					<div class="form-group">
					    <label>Xác nhận mật khẩu:</label>
					    <input type="password" class="form-control" name="password_confirmation">
					</div>
	  			</div>
	  			<div class="col-sm-3"></div>
	  		</div>
	  	</div>
	  	<div class="panel-footer">
	  		<button type="submit" class="btn btn-success">Tạo</button>
	  	</div>
	</div>
</form>
@endsection