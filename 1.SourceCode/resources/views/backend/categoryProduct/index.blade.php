@extends('layouts.backend.app')
@section('content')
<style>
/*	input {pointer-events:none;}*/
input[readonly].default-cursor {
    cursor: pointer;
}
</style>
<div class="panel panel-primary">
  	<div class="panel-heading">Danh mục sản phẩm</div>
  	<div class="panel-body">
  		<div class="col-sm-6">
  			<div class="alert alert-info">
			  	<strong>Category</strong>
			</div>
  			@foreach($categoryProducts as $item)
	  			<div class="input-group">
				    <input onclick="selectCategoryProduct(<?php echo $item->category_product_id; ?>)" type="text" readonly class="form-control default-cursor" value="{{ $item->name }}">
				    <div class="input-group-btn">
				      	<button class="btn btn-default" type="submit">
				        	<i class="icon-remove"></i>
				      	</button>
				    </div>
			  	</div>
		  	@endforeach
  		</div>
  		<div class="col-sm-6">
  			<div class="form-group">
			  	<label>Category:</label>
			  	<input type="hidden" class="form-control" name="category_product_id" id="category_product_id" value="">
			  	<input type="text" class="form-control" name="category_product_value" id="category_product_value" value="">
			</div>
  			<div id="show_sec_category_product">
  				
  			</div>
  		</div>
  	</div>
  	<div class="panel-footer">
  		<button type="button" class="btn btn-success">Thêm mới</button>
  	</div>
</div>
<script>
	function selectCategoryProduct(category_product_id){
		var data = {
			category_product_id : category_product_id
		}
		$.ajax({
			type: "POST",
			url: "/manager/select-category-product",
			data: {'data': data, '_token': '{{ csrf_token() }}'},
			success: function(result){
				console.log(result);
				$("#show_sec_category_product").html('');
				$("#show_sec_category_product").html("<div class='alert alert-info'><strong>Second Category</strong></div>");
				$.each( result, function( key, value ) {
				  	// alert(result[key]['sec_category_product_id']);
				  	var html = 
					"<div class='input-group'>"
					+"	<input type='text' readonly class='form-control default-cursor' value='"+result[key]['name']+"'>"
					+"	<div class='input-group-btn'>"
					+"		<button class='btn btn-default' type='submit'><i class='icon-remove'></i></button"
					+"	</div>"
					+"</div>";
					$("#show_sec_category_product").append(html);
				});
				
				
			},
			error: function(result){
				console.log(result);
			}
		});
	}
</script>
@endsection