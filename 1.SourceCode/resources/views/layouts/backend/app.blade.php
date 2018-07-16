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

	<script src="{{ asset('jquery/jquery-3.3.1.min.js') }}"></script>
	<!-- Notification -->
    <link href="{{ asset('toastr/build/toastr.css') }}" rel="stylesheet"/>
    <script src="{{ asset('toastr/toastr.js') }}"></script>

    
    <script src="{{ url('DataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('DataTables/js/dataTables.bootstrap.min.js') }}"></script>
</head>
<body>

<!--Header-part-->
<div id="header">

</div>
<!--close-Header-part--> 


<!--top-Header-menu-->
<div id="user-nav">
  	<ul class="nav">
	    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome {{ Auth::user()->email }}</span><b class="caret"></b></a>
	      	<ul class="dropdown-menu">
		        <li><a href="{{ route('indexUser') }}"><i class="icon-user"></i> My Profile</a></li>
		        <li class="divider"></li>
		        <li><a href="#"><i class="icon-check"></i> My Tasks</a></li>
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
	    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
	      	<ul class="dropdown-menu">
		        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> new message</a></li>
		        <li class="divider"></li>
		        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> inbox</a></li>
		        <li class="divider"></li>
		        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> outbox</a></li>
		        <li class="divider"></li>
		        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> trash</a></li>
	      	</ul>
	    </li>
	    <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
	    <li class=""><a title="" href="{{ route('indexFile') }}"><i class="icon icon-cog"></i> <span class="text">File</span></a></li>
  	</ul>
</div>
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
	    <li class="active"><a href="{{ asset('matrix-admin-package/HTML/index.html') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
	    <li> <a href="{{ asset('matrix-admin-package/HTML/charts.html') }}"><i class="icon icon-signal"></i> <span>Charts &amp; graphs</span></a> </li>
	    <li> <a href="{{ asset('matrix-admin-package/HTML/widgets.html') }}"><i class="icon icon-inbox"></i> <span>Widgets</span></a> </li>
	    <li><a href="{{ asset('matrix-admin-package/HTML/tables.html') }}"><i class="icon icon-th"></i> <span>Tables</span></a></li>
	    <li><a href="{{ asset('matrix-admin-package/HTML/grid.html') }}"><i class="icon icon-fullscreen"></i> <span>Full width</span></a></li>
	    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Forms</span> <span class="label label-important">3</span></a>
	      	<ul>
		        <li><a href="{{ asset('matrix-admin-package/HTML/form-common.html') }}">Basic Form</a></li>
		        <li><a href="{{ asset('matrix-admin-package/HTML/form-validation.html') }}">Form with Validation</a></li>
		        <li><a href="{{ asset('matrix-admin-package/HTML/form-wizard.html') }}">Form with Wizard</a></li>
	      	</ul>
	    </li>
	    <li><a href="{{ asset('matrix-admin-package/HTML/buttons.html') }}"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
	    <li><a href="{{ asset('matrix-admin-package/HTML/interface.html') }}"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
	    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
	      	<ul>
		        <li><a href="{{ asset('matrix-admin-package/HTML/index2.html') }}">Dashboard2</a></li>
		        <li><a href="{{ asset('matrix-admin-package/HTML/gallery.html') }}">Gallery</a></li>
		        <li><a href="{{ asset('matrix-admin-package/HTML/calendar.html') }}">Calendar</a></li>
		        <li><a href="{{ asset('matrix-admin-package/HTML/invoice.html') }}">Invoice</a></li>
		        <li><a href="{{ asset('matrix-admin-package/HTML/chat.html') }}">Chat option</a></li>
	      	</ul>
	    </li>
	    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
	      	<ul>
		        <li><a href="{{ asset('matrix-admin-package/HTML/error403.html') }}">Error 403</a></li>
		        <li><a href="{{ asset('matrix-admin-package/HTML/error404.html') }}">Error 404</a></li>
		        <li><a href="{{ asset('matrix-admin-package/HTML/error405.html') }}">Error 405</a></li>
		        <li><a href="{{ asset('matrix-admin-package/HTML/error500.html') }}">Error 500</a></li>
	      	</ul>
	    </li>
	    <!-- <li class="content"> <span>Monthly Bandwidth Transfer</span>
	      	<div class="progress progress-mini progress-danger active progress-striped">
	        	<div style="width: 77%;" class="bar"></div>
	      	</div>
	      	<span class="percent">77%</span>
	      	<div class="stat">21419.94 / 14000 MB</div>
	    </li>
	    <li class="content"> <span>Disk Space Usage</span>
	      	<div class="progress progress-mini active progress-striped">
	        	<div style="width: 87%;" class="bar"></div>
	      	</div>
	      	<span class="percent">87%</span>
	      	<div class="stat">604.44 / 4000 MB</div>
	    </li> -->
  	</ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  	<div id="content-header">
    	<!-- <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div> -->
    	<br>
  	</div>
<!--End-breadcrumbs-->
  	<div class="container-fluid">
  		@yield('content')
  	</div>
</div>
<!--end-main-container-part-->

<!--Footer-part-->
<div class="row-fluid">
  	<div id="footer" class="span12"> @khoivinhphan </div>
</div>
<!--end-Footer-part-->

<script src="{{ asset('matrix-admin-package/HTML/js/excanvas.min.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/jquery.min.js') }}"></script> 
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
<script src="{{ asset('matrix-admin-package/HTML/js/select2.min.js') }}"></script> 
<script src="{{ asset('matrix-admin-package/HTML/js/matrix.popover.js') }}"></script> 
<!-- <script src="{{ asset('matrix-admin-package/HTML/js/jquery.dataTables.min.js') }}"></script>  -->
<script src="{{ url('DataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('matrix-admin-package/HTML/js/matrix.tables.js') }}"></script> 

<script type="text/javascript">
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