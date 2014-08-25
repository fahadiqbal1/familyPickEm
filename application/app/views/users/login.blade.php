<h2 class="form-signup-heading">Log In <i class="fa fa-sign-in"></i></h2>
	{{ Form::open(array('action' => array('UserController@postSignin'), 'class'=>'form-signin')) }}
		<div class="form-group">
			<!-- <label for="loginEmail" class="col-sm-2 control-label">Email</label> -->
				{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address', 'id'=>'loginEmail')) }}
		</div>
		<div class="form-group">
			<!-- <label for="loginPassword" class="col-sm-2 control-label">Password</label> -->
				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'id'=>'loginPassword')) }}
		</div>
		<div class="form-group">
			<div class="checkbox">
				<label>
					<input type="checkbox" value="true" name="remember_me"> Remember me
				</label>
			</div>
		</div>
		{{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
	{{ Form::close() }}