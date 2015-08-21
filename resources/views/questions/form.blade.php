		<div class="form-group">
			{{ Form::label('stages_id', 'Stage_id:')  }}
			{{ Form::text('stages_id', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('qtitle', '題目:')  }}
			{{ Form::text('qtitle', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('ans1_title', '選項一:')  }}
			{{ Form::text('ans1_title', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('ans2_title', '選項二:')  }}
			{{ Form::text('ans2_title', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('ans3_title', '選項三:')  }}
			{{ Form::text('ans3_title', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('ans4_title', '選項四:')  }}
			{{ Form::text('ans4_title', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('ans5_title', '選項五:')  }}
			{{ Form::text('ans5_title', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('ans6_title', '選項六:')  }}
			{{ Form::text('ans6_title', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('answer', '答案:')  }}
			{{ Form::text('answer', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::label('detailed', '詳解:')  }}
			{{ Form::text('detailed', null, ['class' => 'form-control']) }}
		</div>

		<div class="form-group">
			{{ Form::submit($submitButtonText, null, ['class' => 'btn btm-primary form-control']) }}
		</div>