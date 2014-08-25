{{ Form::model($user, array('action' => array('AppController@postUpdateProfile', $user->id))) }}
	<h2 class="form-signup-heading">Edit your profile, {{$user->firstName}}!</h2>
	<br>
	<ul>
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
        <div class="form-group">{{ Form::text('firstName', null, array('class'=>'form-control', 'placeholder'=>'First Name', 'disabled')) }}</div>
	    <div class="form-group">{{ Form::text('lastName', null, array('class'=>'form-control', 'placeholder'=>'Last Name', 'disabled')) }}</div>
	    <div class="form-group">{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address', 'disabled')) }}</div>
	    <div class="form-group">{{ Form::text('teamname', null, array('class'=>'form-control', 'placeholder'=>'Team Name')) }}</div>
	    <div class="form-group">{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}</div>
	    <div class="form-group">{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}</div>
 
	{{ Form::submit('Update', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}