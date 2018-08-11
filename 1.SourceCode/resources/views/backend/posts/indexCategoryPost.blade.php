@extends('layouts.backend.app')
@section('content')
<form action="" method="POST" accept-charset="utf-8" id="formAddCategory">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="POST">
	<div class="panel panel-primary form">
	  	<div class="panel-heading">Chuyên mục bài viết</div>
	  	<div class="panel-body">
			<div class="col-sm-4">
				<div class="form-group">
					<label>Tiêu đề <span style="color: red">*</span></label>
					<input type="text" name="title" id="title" class="form-control" placeholder="Nội dung tab cha cho bài viết">
				</div>
				<div class="form-group">
					<label>Mô tả:</label>
					<textarea placeholder="Mô tả chi tiết nội dung của chuyên mục" class="form-control"  name="information" id="information" rows="5"></textarea>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-success btn-sm pull-right" id="addCategory"><span class="icon icon-plus"></span> Thêm mới</button>
				</div>
			</div>
			<div class="col-sm-8">
				<button disabled="" type="button" class="btn btn-danger btn-sm delete-row"><span class="icon icon-trash"></span> Xóa</button>
				<table class="table table-bordered" id="categoryTable">
				    <thead>
				      	<tr>
				      		<th style="width:5%"><input type="checkbox" id="select_all_category"></th>
					        <th style="width:5%">STT</th>
					        <th style="width:30%">Tên</th>
					        <th style="width:45%">Mô tả</th>
				      	</tr>
				    </thead>
				    <tbody>
				    	@php($i = 0)
						@foreach($category_news as $item)
							@php($i++)
			    			<tr>
			    				<td align="center"><input class="myClass" type="checkbox" attrCategoryId="{{ $item->category_new_id }}" attrCategoryName="{{ $item->name }}" name="checkboxCategory[]"></td>
					        	<td align="center"><span class="stt">{{ $i }}</span></td>
					        	<td><a href="" class="showModal" id="<?php echo "title".$item->category_new_id; ?>" data-id="{{ $item->category_new_id }}" data-name="{{ $item->name }}" data-info="{{ $item->information }}" data-toggle="modal" data-target="#modalEditCategory" style="color: #428bca;">{{ $item->name }}</a></td>
					        	<td><span id="<?php echo "info".$item->category_new_id; ?>">{{ $item->information }}</span></td>
					      	</tr>
					    @endforeach
				    </tbody>
				</table>
			</div>	
	  	</div>
	  	<div class="panel-footer">
	  		
	  	</div>
	</div>
</form>
<!-- Modal edit category - start -->
<form action="" method="POST" accept-charset="utf-8" id="formEditCategory">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input type="hidden" name="_method" value="POST">
	<div id="modalEditCategory" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<h4 class="modal-title"><span class="icon icon-edit"></span> Chỉnh sửa bài viết</h4>
	      	</div>
	      	<div class="modal-body">
	      		<input type="text" hidden name="idCategory" id="idCategory">
	        	<div class="form-group">
					<label>Tiêu đề <span style="color: red">*</span></label>
					<input type="text" name="titleCategory" class="form-control" id="titleCategory">
				</div>
				<div class="form-group">
					<label>Mô tả:</label>
					<textarea class="form-control" rows="5" name="infoCategory" id="infoCategory"></textarea>
				</div>
	      	</div>
	      	<div class="modal-footer">
	      		<button type="button" class="btn btn-info btn-sm" data-dismiss="modal" id="editCategory"><span class="icon icon-edit"></span> Chỉnh sửa</button>
	        	<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><span class="icon icon-remove"></span> Đóng</button>
	      	</div>
	    </div>
	  	</div>
	</div>
</form>
<!-- Modal edit category - end -->
<script>
	$(document).ready(function(){
		// Find and remove selected table rows with checkbox
		$('.delete-row').click(function(){
			var stringId = '';
			var stringName = '';
			$('#categoryTable tbody').find('input[name="checkboxCategory[]"]').each(function(){
				var category_new_id = $(this).attr("attrCategoryId");
				var category_name 	= $(this).attr("attrCategoryName");
				if($(this).is(":checked")){
					stringId = stringId+category_new_id+',';
					stringName = stringName+category_name+',';
				}
				data = {
					category_new_id : stringId,
					category_name 	: stringName,
				};
			});
			if(confirm("Bạn có chắc chắn muốn xóa?")){
				$.ajax({
					type: "POST",
					url: "/manager/posts/delete-muti-category",
					data: {'data': data, '_token': '{{  csrf_token() }}'},
					success: function(result){
						console.log(result);
						$('#categoryTable tbody').find('input[name="checkboxCategory[]"]').each(function(){
							if($(this).is(":checked")){
								$('#categoryTable').DataTable().row($(this).parents("tr")).remove().draw();
							}
		                });
		                toastr.success('Xóa thành công');
					},
					error: function(result){
						console.log(result);
						toastr.error('Lỗi hệ thống khi thực hiện');	
					}
				});
			}
		});

		//Format datatable
		$('#categoryTable').DataTable({
			// "pagingType": "full_numbers",
			"searching"		: true,
			"lengthChange"	: true,
			"bInfo"			: true,
			"pageLength"	: 10,
			"bPaginate"		: true,
			"language": {
	            "oPaginate": {
					"sPrevious"	: "&laquo;",
					"sNext"		: "&raquo;",
				},
	            "lengthMenu"	: "Thể hiện _MENU_ bản ghi cho mỗi trang",
	            "zeroRecords"	: "Không tìm thấy dữ liệu",
	            "info"			: "Danh sách: _START_ ~ _END_ của _MAX_ dữ liệu",
	            "infoEmpty"		: "Không có dữ liệu",
	            "infoFiltered"	: "(được lọc từ _MAX_ bản ghi)",
	            "search"		: "Tìm kiếm:"
		    },
			drawCallback: function(){
				//Check stt
                $("#categoryTable tbody td span.stt").each(function(index){
                    $(this).html(index+1);
                });

                //Show modal edit category
				$('.showModal').click(function(){
					var category_new_id = $(this).attr('data-id');
					var category_name 	= $(this).attr('data-name');
					var category_info 	= $(this).attr('data-info');
					$('.modal-body #idCategory').val(category_new_id);
					$('.modal-body #titleCategory').val(category_name);
					$('.modal-body #infoCategory').val(category_info);
				});

				//Show-hide button delete all
				$('.myClass').change(function(){
					var dem = 0;
					$('#categoryTable tbody').find('input[name="checkboxCategory[]"]').each(function(){
						if($(this).is(":checked")){
							dem++;
						}
		            });
		            if(dem>0){
		            	$('.delete-row').removeAttr('disabled');
		            	$('#select_all_category').attr('checked', '');
		            }else{
		            	$('.delete-row').attr('disabled', '');
		            	$('#select_all_category').removeAttr('checked');
		            }
				});
            }
		});
	
		//Validate form add category
		$('#formAddCategory').validate({
			rules: {
				title: {
					required 	: true,
					maxlength 	: 50,
				},
				information: {
					maxlength 	: 100,
				}
			},
			messages: {
				title: {
					required	: "<span style='color: red'>Không được để trống</span>",
					maxlength	: "<span style='color: red'>Không vượt quá 50 ký tự</span>",
				},
				information: {
					maxlength	: "<span style='color: red'>Không vượt quá 100 ký tự</span>",
				}
			}
		});

		//Validate form edit category
		$('#formEditCategory').validate({
			rules: {
				titleCategory: {
					required 	: true,
					maxlength 	: 50,
				},
				infoCategory: {
					maxlength 	: 100,
				}
			},
			messages: {
				titleCategory: {
					required	: "<span style='color: red'>Không được để trống</span>",
					maxlength	: "<span style='color: red'>Không vượt quá 50 ký tự</span>",
				},
				infoCategory: {
					maxlength	: "<span style='color: red'>Không vượt quá 100 ký tự</span>",
				}
			}
		});

		//Add category
		$('#addCategory').click(function(){
			var form = $("#formAddCategory");
			var data = $("#formAddCategory").serialize();
			if(! form.valid()) return false;
			$.ajax({
				type: "POST",
				url: "/manager/posts/add-category",
				data: data,
				success: function(result){
					console.log(result);
					if(result[0]['information'] == null){
						result[0]['information'] = '';
					}
					var html = 
					"<tr>"
					+"	<td align='center'><input class='myClass' type='checkbox' attrCategoryId='"+result[0]['category_new_id']+"' attrCategoryName='"+result[0]['name']+"' name='checkboxCategory[]'></td>"
					+"	<td align='center'><span class='stt'></span></td>"
					+"	<td><a href='' class='showModal' id='title"+result[0]['category_new_id']+"' data-id='"+result[0]['category_new_id']+"' data-name='"+result[0]['name']+"' data-info='"+result[0]['information']+"' data-toggle='modal' data-target='#modalEditCategory' style='color: #428bca;'>"+result[0]['name']+"</a></td>"
					+"	<td><span id='info"+result[0]['category_new_id']+"'>"+result[0]['information']+"</span></td>"
					+"</tr>";
					$('#categoryTable').DataTable().row.add($(html)).draw();
					$('#title').val('');
					$('#information').val('');
					$("#categoryTable").DataTable().page('last').draw('page');
					toastr.success('Thêm thành công');
				},
				error: function(result){
					console.log(result);
				}
			});
		});

		//Edit category
		$('#editCategory').click(function(){
			var category_new_id 	= $('#idCategory').val();
			var category_new_name 	= $('#titleCategory').val();
			var category_new_info 	= $('#infoCategory').val();
			//Validate form
			var form = $("#formEditCategory");
			if(! form.valid()) return false;
			//Data form
			var data = $("#formEditCategory").serialize();

			$.ajax({
				type: "POST",
				url: "/manager/posts/edit-category",
				data: data,
				success: function(result){
					console.log(result);
					$('#title'+category_new_id).html('');
					$('#info'+category_new_id).html('');
					//Append data
					$('#title'+category_new_id).append(category_new_name);
					$('#info'+category_new_id).append(category_new_info);
					$('#title'+category_new_id).attr('data-name', category_new_name);
					$('#title'+category_new_id).attr('data-info', category_new_info);
					//Nofication
					toastr.success('Chỉnh sửa thành công');
				},
				error: function(result){
					console.log(result);
					toastr.error('Lỗi hệ thống khi lưu');
				}
			});
		});

		//Check box all
		$("#select_all_category").change(function(){
			var checkboxes = $(this).closest('form').find(':checkbox');
    		checkboxes.prop('checked', $(this).is(':checked'));
    		var dem = 0;
			$('#categoryTable tbody').find('input[name="checkboxCategory[]"]').each(function(){
				if($(this).is(":checked")){
					dem++;
				}
            });

            if(dem>0){
            	$('.delete-row').removeAttr('disabled');
            }else{
            	$('.delete-row').attr('disabled', '');
            }
		});
	});
	
</script>
@endsection