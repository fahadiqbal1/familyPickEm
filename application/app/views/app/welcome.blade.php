<div class="row">
	<div class="col-md-12">
		Select a week to make picks for:
		<div class="btn-group">
			@for ($i=1; $i < 17; $i++)
				{{ HTML::linkAction('AppController@getMakePick', $i, array($i), array('class'=>'btn btn-primary btn-sm')) }}
			@endfor
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">Leaderboard</div>
			<table class="table">
				<tr><th>#</th><th>Name</th><th>Points</th></tr>
			</table>
		</div>
	</div>
</div>


{{ Form::select('company_id', Teams::lists('name', 'abbr')) }}
{{ Form::select('company_idd', Matches::where('weekNumber','=',1)->lists('awayTeam', 'id')) }}