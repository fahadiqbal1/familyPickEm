	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">Leaderboard</div>
			<table class="table table-bordered table-condensed table-striped table-hover">
				<thead>
					<tr><th></th><th>Name</th><th>Points</th></tr>
				</thead>
				<tbody>
					<?php $i=1 ?>
					@foreach ($leaderboard as $leader)
						<tr>
							<td>{{ $i }}</td>
							<td><span title="{{ $leader->firstName }} {{ $leader->lastName }}">{{ $leader->teamname}}</span></td>
							<td>{{ $leader->points }}</td>
						</tr>
						<?php $i++ ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-4">
		 <div class="panel panel-default">
			<div class="panel-heading">Team Standings</div>
			<table class="table table-bordered table-condensed table-striped table-hover">
				<thead>
					<tr><th>Team</th><th>Wins</th><th>Losses</th></tr>
				</thead>
				<tbody>
					@foreach ($teams as $team)
						<tr>
							<td>{{ $team->name }} {{ $team->nickname }}</td>
							<td>{{ $team->wins }}</td>
							<td>{{ $team->losses }}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="panel-footer">{{ $teams->links() }}</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-default">
			@if ($user->admin == 1)
				<div class="panel-heading">Admin Menu</div>
				<div class="panel-body">
					{{ HTML::linkAction('AdminController@getIndex', 'Update Games', $user->id, array('class'=>'')) }}
				</div>
			@else
				<div class="panel-heading">Rules</div>
				<div class="panel-body">
					<ul>
						<li>Pick 5 randomly selected games for each week</li>
						<li>Winning a game is 3 points</li>
						<li>A tie is 1 point</li>
						<li>And a loss is 0 points</li>
					</ul>
				</div>
			@endif
		</div>
	</div>