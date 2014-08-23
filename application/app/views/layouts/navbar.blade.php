<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			@if(!Auth::check())
				<a class="navbar-brand" href="/">Pick 'Em</a>
			@else
				<a class="navbar-brand" href="/app/welcome">Pick 'Em</a>
			@endif
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
		<li><a href="#">About</a></li>
		@if(!Auth::check())
		  <li>{{ HTML::link('users/register', 'Register') }}</li>   
		  <li>{{ HTML::link('users/login', 'Login') }}</li>
		@else
		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $user->firstName. ' ' . $user->lastName }}<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
			  <li>{{ HTML::linkAction('AppController@getProfile', 'Profile', array($user->id)) }}</li>
			  <li class="divider"></li>
			  <li>{{ HTML::link('/users/logout', 'Logout') }}</li>
			</ul>
		  </li>
		@endif
			</ul>
		</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
