{{ Form::open(array('action' => array('UserController@postCreate'), 'class'=>'form-signup')) }}
	<h2 class="form-signup-heading">Register to Play</h2>
 
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
        <div class="form-group">{{ Form::text('firstName', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}</div>
	    <div class="form-group">{{ Form::text('lastName', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}</div>
	    <div class="form-group">{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}</div>
	    <div class="form-group">{{ Form::text('teamname', null, array('class'=>'form-control', 'placeholder'=>'Team Name')) }}</div>
	    <div class="form-group">{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}</div>
	    <div class="form-group">{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}</div>
	    <div class="form-group">{{ Form::captcha() }}</div>
 
	{{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}