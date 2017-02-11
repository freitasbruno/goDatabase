{!! Form::open(array('url' => 'updateAppTask', 'class' => 'uk-form formSubmitHidden')) !!}
	{!! Form::hidden('item_id', $item->id) !!}
	<div class="uk-inline uk-width-1-1">
		<a class="uk-form-icon uk-form-icon uk-invisible formSubmitBtn" href="#" uk-icon="icon: check" onclick="$(this).closest('form').submit()"></a>
		{!! Form::text('name', null, array('class' => 'uk-input uk-background-muted formSubmitField', 'placeholder' => 'Add New', 'required' => 'required')) !!}
    </div>
{!! Form::close() !!}