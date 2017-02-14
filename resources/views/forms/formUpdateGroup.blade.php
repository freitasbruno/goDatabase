<div class="uk-padding-remove uk-margin-small-right uk-margin-remove">
	{!! Form::open(array('url' => 'updateGroup/'.$group->id, 'class' => 'uk-form')) !!}
		<div class="uk-inline uk-width-1-1">
			<a class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: check" onclick="$(this).closest('form').submit()"></a>
			{!! Form::text('name', $group->name, array('class' => 'uk-input toggleField', 'required' => 'required')) !!}
        </div>
	{!! Form::close() !!}
</div>
