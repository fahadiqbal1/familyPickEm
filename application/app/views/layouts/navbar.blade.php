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
				{{ HTML::linkAction('UserController@getLogin', 'Pick \'Em', null, array('class'=>'navbar-brand')) }}
			@else
				<!-- <a class="navbar-brand" href="/app/welcome">Pick 'Em</a> -->
				{{ HTML::linkAction('AppController@getWelcome', 'Pick \'Em', null, array('class'=>'navbar-brand')) }}
			@endif
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
		<li><a href="#">About</a></li>
		@if(!Auth::check())
		  <li>{{ HTML::linkAction('UserController@getRegister', 'Register') }}</li>   
		  <li>{{ HTML::linkAction('UserController@getLogin', 'Login') }}</li>
		@else
		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $user->firstName. ' ' . $user->lastName }}<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
			  <li>{{ HTML::linkAction('AppController@getProfile', 'Profile', array($user->id), array('id'=>'profile')) }}</li>
			  <li class="divider"></li>
			  <li>{{ HTML::linkAction('UserController@getLogout', 'Logout', null, array('id'=>'logout')) }}</li>
			</ul>
		  </li>
		@endif
			</ul>
		</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
