<!DOCTYPE html>
<html>
<head>
	<title>Cửa thông tin</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- <link rel="stylesheet" href="{{ asset('matrix-admin-package/HTML/css/bootstrap.min.css') }}" /> -->
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('matrix-admin-package/HTML/css/bootstrap-responsive.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('matrix-admin-package/HTML/css/fullcalendar.css') }}" />
	<link rel="stylesheet" href="{{ asset('matrix-admin-package/HTML/css/matrix-style.css') }}" />
	<link rel="stylesheet" href="{{ asset('matrix-admin-package/HTML/css/matrix-media.css') }}" />
	<link href="{{ asset('matrix-admin-package/HTML/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
	<link rel="stylesheet" href="{{ asset('matrix-admin-package/HTML/css/jquery.gritter.css') }}" />
	<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'> -->
	<link href="{{ url('DataTables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
	

	<!-- <script src="{{ asset('jquery/jquery-3.3.1.min.js') }}"></script> -->
	<script src="{{ asset('matrix-admin-package/HTML/js/jquery.min.js') }}"></script>
	<!-- Notification -->
    <link href="{{ asset('toastr/build/toastr.css') }}" rel="stylesheet"/>
    <script src="{{ asset('toastr/toastr.js') }}"></script>

    <!-- Datatable -->
    <script src="{{ url('DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('DataTables/js/dataTables.bootstrap.min.js') }}"></script>

    <!-- Jquery ui -->
    <link rel="stylesheet" type="text/css" href="{{ asset('jquery-ui/jquery-ui.css') }}">
    <script src="{{ asset('jquery-ui/jquery-ui.js') }}"></script>

    <!-- Select 2 -->
    <link href="{{ asset('select2/dist/css/select2.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('select2/dist/js/select2.min.js') }}"></script>

	<script src="{{ asset('js/public.js') }}"></script>
	<!-- CKEDITOR -->
	<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
</head>
<style>
	/*START STYLE DATA-TABLE*/
	.dataTables_wrapper .dataTables_paginate {
	  	float: right;
	  	text-align: right;
	  	padding-top: 0.25em;
	}
	.dataTables_wrapper .dataTables_paginate .paginate_button {
	  	box-sizing: border-box;
	  	display: inline-block;
	  	min-width: 1.5em;
	  	padding: 0.5em 1em;
	  	margin-left: 2px;
	  	text-align: center;
	  	text-decoration: none !important;
	  	cursor: pointer;
	  	*cursor: hand;
	  	color: #333333 !important;
	  	border: 1px solid transparent;
	}
	.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
	  	color: #333333 !important;
	  	background-color: white;
	  	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, gainsboro));
	  	/* Chrome,Safari4+ */
	    background: -webkit-linear-gradient(top, white 0%, gainsboro 100%);
	  	/* Chrome10+,Safari5.1+ */
        background: -moz-linear-gradient(top, white 0%, gainsboro 100%);
	    /* FF3.6+ */
	    background: -ms-linear-gradient(top, white 0%, gainsboro 100%);
	    /* IE10+ */
	    background: -o-linear-gradient(top, white 0%, gainsboro 100%);
	    /* Opera 11.10+ */
	    background: linear-gradient(to bottom, white 0%, gainsboro 100%);
	    /* W3C */
	}
	.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
		cursor: default;
		color: #666 !important;
		border: 1px solid transparent;
		background: transparent;
		box-shadow: none;
	}
	/*END STYLE DATA-TABLE*/
</style>
<body>

<!--Header-part-->
<div id="header">
	<h1></h1>
</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
@if(Auth::user()->user_permission_id == 1)
<div id="user-nav">
  	<ul class="nav">
	    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{ Auth::user()->email }}</span><b class="caret"></b></a>
	      	<ul class="dropdown-menu">
		        <li><a href="{{ route('indexUser') }}"><i class="icon-user"></i> Tài khoản</a></li>
		        <li class="divider"></li>
		        <li><a href="{{ route('indexFile') }}"><i class="icon-file"></i> File lưu trữ</a></li>
		        <li class="divider"></li>
		        <li>
		        	@guest

		        	@else
		        		<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-key"></i>{{ __('Logout') }}</a>
		        		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
		        	@endguest
		        </li>
	      	</ul>
	    </li>
	    <li class="dropdown" id="menu-user"><a href="#" data-toggle="dropdown" data-target="#menu-user" class="dropdown-toggle"><i class="icon icon-group"></i> <span class="text">Quản lý user</span><b class="caret"></b></a>
	      	<ul class="dropdown-menu">
		        <li><a title="Danh sách" href="{{ route('showUser') }}"><i class="icon-th-list"></i> Danh sách</a></li>
		        <li class="divider"></li>
		        <li><a title="Danh sách đã xóa" href="{{ route('trashUser') }}"><i class="icon-trash"></i> Thùng rác</a></li>
	      	</ul>
	    </li>
  	</ul>
</div>
@else
<div id="user-nav">
  	<ul class="nav">
	    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{ Auth::user()->email }}</span><b class="caret"></b></a>
	      	<ul class="dropdown-menu">
		        <li><a href="{{ route('indexUser') }}"><i class="icon-user"></i> Tài khoản</a></li>
		        <li class="divider"></li>
		        <li><a href="{{ route('indexFile') }}"><i class="icon-file"></i> File lưu trữ</a></li>
		        <li class="divider"></li>
		        <li>
		        	@guest

		        	@else
		        		<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-key"></i>{{ __('Logout') }}</a>
		        		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
		        	@endguest
		        </li>
	      	</ul>
	    </li>
  	</ul>
</div>
@endif
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
  	<input type="text" placeholder="Search here..."/>
  	<button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  	<ul>
	    <li class="{{ request()->is('manager') ? 'active' : '' }}"><a href="{{ route('homeBackend') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
	    <li class="{{ request()->is('manager/category-product') ? 'active' : '' }}"><a href="{{ route('indexCategoryProduct') }}"><i class="icon-reorder"></i> <span>Danh mục sản phẩm</span></a> </li>
	    <li class="{{ ( request()->is('manager/banner-slide') || request()->is('manager/banner-slide/create') || request()->is('manager/banner-slide/*/edit') ) ? 'active' : '' }}"><a href="{{ route('indexBannerSlide') }}"><i class="icon-picture"></i> <span>Banner</span></a> </li>
	    <li class="submenu {{ ( request()->is('manager/posts') || request()->is('manager/posts/create') || request()->is('manager/posts/category-post')) ? 'active' : '' }}"> <a href=""><i class="icon icon-th-list"></i> <span>Bài viết</span> <span class="label label-important">3</span></a>
	      	<ul>
	      		<li class="{{ request()->is('manager/posts') ? 'active' : '' }}"><a href="{{ route('indexPosts') }}">Danh sách</a></li>
		        <li class="{{ request()->is('manager/posts/create') ? 'active' : '' }}"><a href="{{ route('createPosts') }}">Thêm mới</a></li>
		        <li class="{{ request()->is('manager/posts/category-post') ? 'active' : '' }}"><a href="{{ route('categoryPost') }}">Chuyên mục</a></li>
	      	</ul>
	    </li>
  	</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  	<div id="content-header">
    	<div id="breadcrumb">@yield('breadcrumb')</div>
    	<br>
  	</div>
<!--End-breadcrumbs-->
	@if (Session::has('success'))
		<div id="successMessage" class="container-fluid">
			<div class="alert alert-success">{{ Session::get('success') }}</div>
		</div>
	@endif
	@if (Session::has('error'))
		<div id="successMessage" class="container-fluid">
			<div class="alert alert-danger">{{ Session::get('error') }}</div>
		</div>
	@endif
  	<div class="container-fluid">
  		@yield('content')
  	</div>
</div>
<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
  	<div id="footer" class="span12"> Dev: khoivinhphan </div>
</div>
<!--end-Footer-part-->

<script src="{{ asset('matrix-admin-package/HTML/js/excanvas.min.js') }}"></script> 
<!-- <script src="{{ asset('matrix-admin-package/HTML/js/jquery.min.js') }}"></script>  -->
<script src="{{ asset('matrix-admin-package/HTML/js/jquery.ui.custom.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/jquery.flot.min.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/jquery.flot.resize.min.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/fullcalendar.min.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/matrix.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/matrix.dashboard.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/matrix.interface.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/matrix.chat.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/jquery.validate.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/matrix.form_validation.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/jquery.wizard.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/jquery.uniform.js') }}"></script> 
<!-- <script src="{{ asset('matrix-admin-package/HTML/js/select2.min.js') }}"></script>  -->
<script src="{{ asset('matrix-admin-package/HTML/js/matrix.popover.js') }}"></script> 
<!-- <script src="{{ asset('matrix-admin-package/HTML/js/jquery.dataTables.min.js') }}"></script>  -->
<script src="{{ url('DataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('matrix-admin-package/HTML/js/matrix.tables.js') }}"></script> 

<script type="text/javascript">
	setTimeout(function(){ 
		$("#successMessage").remove();
	}, 3000);
  	// This function is called from the pop-up menus to transfer to
  	// a different page. Ignore if the value returned is a null string:
  	function goPage (newURL) {
      	// if url is empty, skip the menu dividers and reset the menu selection to default
      	if (newURL != "") {
          	// if url is "-", it is this page -- reset the menu:
          	if (newURL == "-" ) {
              	resetMenu();            
          	} 
          	// else, send page to designated URL            
          	else {  
            	document.location.href = newURL;
          	}
      	}
  	}
	// resets the menu selection upon entry to this page:
	function resetMenu() {
	   document.gomenu.selector.selectedIndex = 2;
	}
</script>
</html>