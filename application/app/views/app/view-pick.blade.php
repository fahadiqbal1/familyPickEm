<h2>Your picks for Week {{ $week }}</h2>

@if (count($games) > 0)
	<div id="no-more-tables">
		<table class="table table-bordered table-condensed table-striped table-hover table-responsive">
			<thead>
				<tr>
					<th>Game</th>
					<th>Your Pick</th>
					<th>Game Date</th>
					<th>Game Time (EST)</th>
					<th>Winner</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($games as $game)
					<tr>
						<td data-title="Game">{{ $game->AwayTeam }} vs. {{ $game->HomeTeam }}</td>
						<td data-title="Your Pick">{{ $game->Pick }}</td>
						<td data-title="Game Date">{{ date('l, j M-Y',strtotime($game->gameDate)) }}</td>
						<td data-title="Game Time">{{ $game->gameTime }}</td>
						<td data-title="Winner">{{ $game->winner or 'Game not played yet' }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@else
	<h4>Sorry no picks were made for this week :(</h4>
@endif