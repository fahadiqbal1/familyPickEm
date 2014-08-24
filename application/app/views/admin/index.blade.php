Select a week to update games for:
	<div class="btn-group">
		@for ($i=1; $i < 18; $i++)
			{{ HTML::linkAction('AdminController@getUpdateWeek', $i, array($i,$user->id), array('class'=>'btn btn-success btn-sm')) }}
		@endfor
	</div>