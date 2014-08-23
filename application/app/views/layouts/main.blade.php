<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Pick 'Em</title>
		{{ HTML::style('//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/flatly/bootstrap.min.css') }}
		{{ HTML::style('//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css') }}
	</head>

	<body>
		{{ $navbar }}
		<div class="container">
			@if(Session::has('message'))
				<p class="alert alert-{{ Session::get('msg_lvl') }}">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					{{ Session::get('message') }}
				</p>
			@endif
			<div class="row">
				<div class="col-md-12">
					{{ $content }}
				</div>
			</div>
			
		</div>
		{{ HTML::script('//code.jquery.com/jquery-2.1.0.min.js') }}
		{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
	</body>
</html>