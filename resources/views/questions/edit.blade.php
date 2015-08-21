@extends ('layouts.dashboard')
@section('page_heading', '編輯')


@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-6">
        {{ Form::model($question, ['method' => 'PATCH', 'url' => 'questions/'. $question->id]) }}
			@include('questions.form', ['submitButtonText' => '更新'])
		{{ Form::close() }}
	</div>
</div>
</div>
@stop