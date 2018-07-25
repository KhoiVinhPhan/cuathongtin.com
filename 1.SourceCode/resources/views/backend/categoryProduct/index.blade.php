@extends('layouts.backend.app')
@section('content')
<style>
	input[readonly].default-cursor {
	    cursor: pointer;
	}
</style>
<form action="{{ route('storeCategoryProduct') }}" method="POST" accept-charset="utf-8" id="formCategoryProduct">
	<input type="hidden" name="_method" value="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="panel panel-primary">
	  	<div class="panel-heading">Danh mục sản phẩm</div>
	  	<div class="panel-body">
	  		<div class="col-sm-6">
	  			<div class="alert alert-info">
				  	<strong>Category</strong>
				</div>
				<div id="show_category_product">
					@foreach($categoryProducts as $item)
			  			<div class="input-group">
						    <input onclick="selectCategoryProduct(<?php echo $item->category_product_id; ?>)" type="text" readonly class="form-control default-cursor" id="<?php echo "category_product".$item->category_product_id; ?>" value="{{ $item->name }}">
						    <div class="input-group-btn">
						      	<button onclick="deleteCategoryProduct(<?php echo $item->category_product_id; ?>)" class="btn btn-default remove-category" type="button">
						        	<i class="icon-remove"></i>
						      	</button>
						    </div>
					  	</div>
				  	@endforeach
				</div>
	  		</div>
	  		<div class="col-sm-6">
	  			<div class="form-group">
				  	<label>Category:</label>
				  	<input type="hidden" class="form-control" name="category_product_id" id="category_product_id" value="">
				  	<input type="text" class="form-control" name="category_product_value" id="category_product_value" value="">
				</div>
				<div id="second_category">
					
				</div>
				
	  			<div id="show_sec_category_product">
	  				
	  			</div>
	  		</div>
	  	</div>
	  	<div class="panel-footer">
	  		<button type="button" class="btn btn-success" id="btnSubmitForm">Thêm mới</button>
	  		<button type="button" class="btn btn-info" id="reloadPage"><span class="icon-refresh"></span></button>
	  	</div>
	</div>
</form>
<script>
	$(document).ready(function(){
		//Reload page
		$("#reloadPage").click(function(){
			location.reload();
		});

		//Validate form Category
		$("#formCategoryProduct").validate({
			rules:{
				category_product_value: {
					required: true,
				}
			},
			messages:{
				category_product_value: {
					required: "<span style='color: red'>Không được để trống</span>",
				}
			}
		});

		$("#btnSubmitForm").click(function(){
			if(!$("#formCategoryProduct").valid()) return false;
			$("#formCategoryProduct").submit();
		});
	});

	//Select Category
	function selectCategoryProduct(category_product_id){
		var category_product_value = $("#category_product"+category_product_id).val();
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
				$("#second_category").html(
					"<div class='form-group'>"
					+	"<label>Second Category:</label>"
					+	"<input type='hidden' class='form-control' name='sec_category_product_id' id='sec_category_product_id' value=''>"
					+	"<input type='text' class='form-control' name='sec_category_product_value' id='sec_category_product_value' value=''>"
					+"</div>");
				$("#show_sec_category_product").html("<div class='alert alert-info'><strong>Second Category</strong></div>");
				$.each( result, function( key, value ) {
				  	var html = 
					"<div class='input-group'>"
					+"	<input id='sec_category_product"+result[key]['sec_category_product_id']+"' onclick='selectSecCategoryProduct("+result[key]['sec_category_product_id']+")' type='text' readonly class='form-control default-cursor' value='"+result[key]['name']+"'>"
					+"	<div class='input-group-btn'>"
					+"		<button onclick='deleteSecCategory("+result[key]['sec_category_product_id']+")' class='btn btn-default remove-sec-category' type='button'><i class='icon-remove'></i></button"
					+"	</div>"
					+"</div>";
					$("#show_sec_category_product").append(html);
				});
				
				$("#category_product_value").val(category_product_value);
				$("#category_product_id").val(category_product_id);
			},
			error: function(result){
				console.log(result);
			}
		});
	}

	//Select Sec_Category
	function selectSecCategoryProduct(sec_category_product_id){
		var sec_category_product_value = $("#sec_category_product"+sec_category_product_id).val();
		$("#sec_category_product_id").val(sec_category_product_id);
		$("#sec_category_product_value").val(sec_category_product_value);
	}

	//Delete second category
	function deleteSecCategory(sec_category_product_id){
		var data = {
			sec_category_product_id: sec_category_product_id,
		}
		$("#show_sec_category_product").on('click', '.remove-sec-category', function(){
			var index = $(this).closest("div.input-group").index();
			$(this).closest("div.input-group").remove();
			$.ajax({
				type: "POST",
				url: "/manager/sec-category-product/delete",
				data: {'data': data, '_token': '{{ csrf_token() }}'},
				success: function(result){
					console.log(result);
					toastr.success('Xóa thành công')
					$(this).closest("div.input-group").remove();
				},
				error: function(result){
					console.log(result);
					toastr.error('Lỗi hệ thống khi lưu')
				}
			});
		});
	}

	//Delete category
	function deleteCategoryProduct(category_product_id){
		$("#show_category_product").on('click', '.remove-category', function(){
			var index = $(this).closest(".input-group").index();
			$(this).closest(".input-group").remove();
		});
	}
</script>
@endsection