<div class="uk-card uk-padding-remove">
	<div class="uk-padding-small">
		<div class="uk-card uk-card-body uk-padding-small appTaskList">
			@if($item->privileges != 'view')
				<div class=" uk-margin-bottom">
					@include('forms/formNewAppTask')
				</div>
			@endif
			<div class="appTaskToDo">
			@foreach(Item::$appModels as $appClass => $appName)
				@foreach($item->apps[$appName] as $task)
					@if(!$task->complete)
						@include('includes/apps/appTask')
					@endif
				@endforeach
			@endforeach
			</div>
			
			<div class="toggleWrapper uk-margin-small-top appTaskCompleteOuter">
				<div class="togglePanel">
		        	<a href="#" class="uk-link-reset uk-text-small preventScroll toggleBtn">
		        		<span class="uk-margin-small-right" uk-icon="icon: chevron-down"></span><span>Show Complete</span>
		        	</a>
		        </div>	
		        
	    		<div class="uk-hidden togglePanel">
	    			
	    			<div class="appTaskComplete">
					@foreach(Item::$appModels as $appClass => $appName)
						@foreach($item->apps[$appName] as $task)
							@if($task->complete)
								@include('includes/apps/appTask')
							@endif
						@endforeach
					@endforeach
	    			</div>
	    			
		        	<a href="#" class="uk-link-reset uk-text-small preventScroll toggleBtn">
		        		<span class="uk-text-center" uk-icon="icon: chevron-up"></span><span>Hide Complete</span>
		        	</a>
	    		</div>
	        </div>
	    </div>
	</div>
</div>