<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/style.css') }}"/>
</head>
<body>
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Cửa thông tin</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Page 1-1</a></li>
							<li><a href="#">Page 1-2</a></li>
							<li><a href="#">Page 1-3</a></li>
						</ul>
					</li>
					<li><a href="#">Page 2</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
				</ul>
			</div>
		</nav>

		
		<div class="form-group">
			<label for="comment">Comment:</label>
			<textarea class="form-control" rows="5" id="comment"></textarea>
		</div>

		<script src="../../../../jquery/jquery-3.3.1.min.js"></script>
	    <script src="../../../../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>