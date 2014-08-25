
<h2>Updating Games for Week {{ $weekNumber }}</h2>
<table class="table table-condensed table-striped table-bordered">
	<thead>
		<tr>
			<th>Match ID</th>
			<th>Home Team</th>
			<th>Away Team</th>
			<th>Winner</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($matches as $match)
			@if($match->winner == null)
				{{ Form::open( array('action' => array('AdminController@postUpdateMatch', $match->id, $match->weekNumber, $user->id)) ) }}
				<tr>
					<td>{{ $match->id }}</td>
					<td><label>{{ Form::radio("winner",$match->awayTeam) }} {{ $match->AwayTeam }}</label></td>
					<td><label>{{ Form::radio("winner",$match->homeTeam) }} {{ $match->HomeTeam }}</label></td>
					<td> {{ $match->Winner or 'Not Updated Yet' }} </td>
					<td>{{ Form::submit('Update Match', array('class'=>'btn btn-default btn-xs'))}}</td>
				</tr>
				{{ Form::close() }}
			@else
				<tr>
					<td>{{ $match->id }}</td>
					<td>{{ $match->AwayTeam }} </td>
					<td>{{ $match->HomeTeam }} </td>
					<td>{{ $match->Winner}} </td>
					<td></td>
				</tr>
			@endif
		@endforeach
	</tbody>
</table>



