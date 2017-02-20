<div class="uk-visible-toggle toggleForm">
	<span class="uk-text-meta">{!! $app->description !!}</span>
	<a href="#" class="uk-icon-link uk-margin-small-left uk-hidden-hover toggleFormBtn preventScroll" uk-icon="icon: pencil; ratio:0.7"></a>
	<a href="{{ URL::to('/deleteAppTextarea/' . $app->id) }}" class="uk-icon-link uk-hidden-hover" uk-icon="icon: trash; ratio:0.7"></a>
	<p class="uk-margin-small uk-margin-remove-top toggleTextEdit">{!! $app->text !!}</p>
</div>
<div class="uk-hidden toggleForm">
{!! Form::open(array('url' => 'updateAppTextarea/' . $app->id, 'class' => 'uk-form')) !!}
	{{ Form::label('description', 'Description', ['class' => 'uk-form-label']) }}
	{!! Form::text('description', $app->description, array('class' => 'uk-input uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Title', 'required' => 'required')) !!}
	
	{{ Form::label('notes', 'Notes', ['class' => 'uk-form-label']) }}
	{{ Form::textarea('notes', $app->text, array('class' => 'uk-textarea uk-background-muted uk-margin-small-top uk-margin-small-bottom', 'placeholder' => 'Upload description', 'required' => 'required', 'rows' => '3')) }}
   
    {{ Form::submit('SUBMIT', array('class' => 'uk-button uk-button-text uk-align-right')) }}
{!! Form::close() !!}	
</div>



