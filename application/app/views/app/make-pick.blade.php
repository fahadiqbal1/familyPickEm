Pick Games for Week {{ $week }}
{{ Form::open( array('route' => array('api.picks.store', $user->email) ) ) }}
<table class="table table-bordered table-condensed table-striped table-hover table-responsive">
	<tr>
		<th>Away</th>
		<th>Home</th>
		<th>Game Date</th>
		<th>Game Time (EST)</th>
		<th>Winner</th>
	</tr>
	@foreach ($games as $game)
		<tr>
			<td><label>{{ Form::radio("$game->id",$game->awayTeam) }} {{ $game->AwayTeam }}</label></td>
			<td><label>{{ Form::radio("$game->id",$game->homeTeam) }} {{ $game->HomeTeam }}</label></td>
			<td>{{ date('l, j M-Y',strtotime($game->gameDate)) }}</td>
			<td>{{ $game->gameTime }}</td>
			<td>{{ $game->winner }}</td>
		</tr>
	@endforeach
	
</table>
{{ $games->links() }}
{{ Form::submit('Submit Picks', array('class'=>'btn btn-default'))}}
{{ Form::reset('Reset Picks', array('class'=>'btn btn-default'))}}
{{ Form::close() }}