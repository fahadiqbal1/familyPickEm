<h2>Pick Games for Week {{ $week }}</h2>
{{ Form::open( array('route' => array('api.picks.store', null) ) ) }}
	<div id="no-more-tables">
		<table class="table table-bordered table-condensed table-striped table-hover">
			<thead>
				<tr>
					<th>Away</th>
					<th>Home</th>
					<th>Game Date</th>
					<th>Game Time (EST)</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($games as $game)
					<tr>
						<td data-title="Away Team"><label>{{ Form::radio("$game->id",$game->awayTeam) }} {{ $game->AwayTeam }}</label></td>
						<td data-title="Home Team"><label>{{ Form::radio("$game->id",$game->homeTeam) }} {{ $game->HomeTeam }}</label></td>
						<td data-title="Game Date">{{ date('l, j M-Y',strtotime($game->gameDate)) }}</td>
						<td data-title="Game Time">{{ $game->gameTime }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	{{ Form::submit('Submit Picks', array('class'=>'btn btn-primary'))}}
	{{ Form::reset('Reset Picks', array('class'=>'btn btn-default'))}}
{{ Form::close() }}