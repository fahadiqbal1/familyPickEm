<h2 class="form-signup-heading">Log In :D</h2>
{{ Form::open(array('url'=>'/users/signin', 'class'=>'form-signin')) }}
		<div class="form-group">
			<!-- <label for="loginEmail" class="col-sm-2 control-label">Email</label> -->
				{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address', 'id'=>'loginEmail')) }}
		</div>
		<div class="form-group">
			<!-- <label for="loginPassword" class="col-sm-2 control-label">Password</label> -->
				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password', 'id'=>'loginPassword')) }}
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
					<label>
						<input type="checkbox"> Remember me
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10">
				{{ Form::submit('Login', array('class'=>'btn btn-default btn-block'))}}
			</div>
		</div>
{{ Form::close() }}