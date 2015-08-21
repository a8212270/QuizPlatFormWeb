@extends('layouts.dashboard')
@section('page_heading','所有題目')


@section('section')
	
<div class="row">
	<div class="col-sm-12">
	<table class="table table-bordered" id="questions">
			<thead>
				<tr>
					<th>id</th>
					<th>stage_id</th>
					<th>qtitle</th>
					<th>ans1_title</th>
					<th>ans2_title</th>
					<th>ans3_title</th>
					<th>ans4_title</th>
					<th>ans5_title</th>
					<th>ans6_title</th>
					<th>answer</th>
					<th>detailed</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($questions as $question)
				<tr>
					<td><a href="{{ URL::to('questions/'.$question->id.'/edit') }}">{{ $question->id }}</a></td>
					<td>{{ $question->stages_id }}</td>
					<td>{{ $question->qtitle }}</td>
					<td>{{ $question->ans1_title }}</td>
					<td>{{ $question->ans2_title }}</td>
					<td>{{ $question->ans3_title }}</td>
					<td>{{ $question->ans4_title }}</td>
					<td>{{ $question->ans5_title }}</td>
					<td>{{ $question->ans6_title }}</td>
					<td>{{ $question->answer }}</td>
					<td>{{ $question->detailed }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
		
</div>
</div>

@stop

@section('footer')
	<script>
	$(document).ready(function() {
	    $('#questions').DataTable();
	});
	</script>
@stop