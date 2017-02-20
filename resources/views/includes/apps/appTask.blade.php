<div id="appTask{!! $task->id !!}" class="uk-card {!! $task->complete ? false : 'uk-card-default appSelect' !!} uk-padding-small  appTask">
	<div class="toggleWrapper">
		<div class="togglePanel">
			{!! Form::open(array('url' => 'toggleAppTask/' . $task->id, 'class' => 'uk-form ajaxForm')) !!}
				<div class="uk-inline uk-width-1-1 uk-padding uk-padding-remove-vertical uk-visible-toggle">
					@if($item->privileges != 'view')
						<a class="uk-form-icon taskIcon preventScroll" href="#" uk-icon="icon: {!! $task->complete ? 'plus-circle' : 'minus-circle' !!}" onclick="$(this).closest('form').submit()"></a>
					@endif
					{!! $task->complete ? '<s  class="uk-text-muted">' : false !!}<span class="{!! $item->privileges != 'view' ? 'toggleBtn' : false !!}">{!! $task->name !!}</span>{!! $task->complete ? '</s>' : false !!}
			    	@if($item->privileges != 'view')
			    	<ul class="uk-invisible-hover uk-iconnav uk-position-right">
			    		<li><a href="{{ URL::to('/cloneAppTask/' . $task->id) }}" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover" uk-icon="icon: copy"></a></li>
			            <li><a href="{{ URL::to('/deleteAppTask/' . $task->id) }}" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover" uk-icon="icon: trash"></a></li>
			        </ul>
			        @endif
			    </div>
			{!! Form::close() !!}
		</div>
		@if($item->privileges != 'view')
		<div class="uk-hidden togglePanel">
			{!! Form::open(array('url' => 'updateAppTask/' . $task->id, 'class' => 'uk-form')) !!}
				<div class="uk-inline uk-width-1-1">
					<a class="uk-form-icon taskIcon preventScroll" href="#" uk-icon="icon: check" onclick="$(this).closest('form').submit()"></a>
					{!! Form::text('name', $task->name, array('class' => 'uk-input uk-background-muted ajaxField toggleField', 'placeholder' => 'Add New', 'required' => 'required')) !!}
				</div>
			{!! Form::close() !!}
		</div>
		@endif
	</div>	
</div>