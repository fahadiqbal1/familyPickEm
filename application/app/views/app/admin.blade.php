<table class="table table-bordered table-condensed table-striped table-hover table-responsive">
	<tr>
		<th>Name</th>
		<th>Wins</th>
		<th>Losses</th>
		<th>Ties</th>
	</tr>
	@foreach ($teams as $team)
		<tr>
			<td>{{ $team->name }}</td>
			<td>{{ $team->wins }}</td>
			<td>{{ $team->losses }}</td>
			<td>{{ $team->ties }}</td>
		</tr>
	@endforeach
</table>
{{ $teams->links() }}

	