<div class="row">
	<div class="col-md-12">
		Select a week to make picks for:
		<div class="btn-group">
			@foreach ($menu as $weekNumber => $week)
				@if ($week == 'Y')
					{{ HTML::linkAction('AppController@getViewPick', $weekNumber, array($weekNumber), array('class'=>'btn btn-success btn-sm', 'title'=>'View picks already made')) }}
				@elseif ($week == 'N')
					{{ HTML::linkAction('AppController@getMakePick', $weekNumber, array($weekNumber), array('class'=>'btn btn-primary btn-sm', 'title'=>'Make picks')) }}
				@else
					{{ HTML::linkAction('AppController@getViewPick', $weekNumber, array($weekNumber), array('class'=>'btn btn-danger btn-sm', 'title'=>'Week has already passed')) }}
				@endif
			@endforeach
		</div>
	</div>
</div>
<br>
<div class="row">
	@include('layouts.panels')
</div>
