@extends ('layouts.dashboard')
@section('page_heading','Form')


@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
		{{ Form::open(['url' => 'questions']) }}
			@include('questions.form', ['submitButtonText' => '新增'])
		{{ Form::close() }}
	</div>
</div>
</div>
@stop