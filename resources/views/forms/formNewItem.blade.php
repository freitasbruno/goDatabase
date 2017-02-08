{!! Form::open(array('url' => 'newItem', 'class' => 'uk-form')) !!}
	{{ Form::label('type', 'ITEM TYPE', ['class' => 'uk-form-label']) }}
	{{ Form::select('type', Item::$types, 'Generic', ['class' => 'uk-select uk-margin-small']) }}
	{{ Form::label('name', 'ITEM NAME', ['class' => 'uk-form-label']) }}
	<div class="uk-inline uk-width-1-1 uk-margin-small-top">
		<a id="newItemSubmit" class="uk-form-icon uk-form-icon-flip uk-invisible" href="#" uk-icon="icon: check" onclick="$(this).closest('form').submit()"></a>
		{!! Form::text('name', null, array('id' => 'newItemForm', 'class' => 'uk-input uk-margin-small', 'placeholder' => 'Item name', 'required' => 'required')) !!}
	</div>
	
{!! Form::close() !!}		

<script>
	$("#newItemForm").click(function(){
		$("#newItemSubmit").removeClass("uk-invisible");
	});
	$("#newItemForm").blur(function(){
		$("#newItemSubmit").addClass("uk-invisible");
	});
</script>