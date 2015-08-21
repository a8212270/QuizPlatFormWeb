@extends('app')

@section('content')
	@foreach ($question as $questions)
		<a href="{{ url('/questions', $questions->id) }}">
			<h1>
				{{ $questions->id }}
			</h1>
		</a>

		<p>{{ $questions->qtitle }}</p>
	@endforeach
@stop