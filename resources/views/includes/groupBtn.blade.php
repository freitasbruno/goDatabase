<div class="toggleWrapper">
	<div class="uk-card uk-padding-small uk-visible-toggle togglePanel groupBtn {!! $group->id == session('currentGroup') ? 'selected' : false !!}">
		<div uk-grid>
			<div class="uk-width-expand uk-text-bold toggleTextEdit">
				<a href="{{ URL::to('/groups/' . $group->id) }}" class="uk-link-reset">
					<span class="uk-margin-small-right" uk-icon="icon: {!! $group->icon !!}"></span>
					{!! $group->name !!}
				</a>
			</div>
			@if($group->id_parent != 0)
				@if($group->id_parent == auth::user()->id_trash_group)
	            	<div class="uk-width-auto uk-margin-right">
				        <ul class="uk-iconnav uk-align-right">
	            			<li><a href="{{ URL::to('/restoreItem/' . $group->id) }}" class="uk-icon-link uk-align-right uk-margin-remove" uk-icon="icon: refresh"></a></li>
			        	</ul>
				    </div>
	            @elseif($group->privileges != 'view')
					<div class="uk-width-auto uk-margin-right uk-light uk-hidden-hover toggleIconWrapper">
			        	<ul class="uk-iconnav uk-hidden toggleIconNav">
			        		<li><a href="#" id="editBtn{!! $group->id !!}" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleBtn" uk-icon="icon: pencil"></a></li>
							@if($group->id_owner == Auth::user()->id || $group->isSharedGroup())
			        			<li><a href="#" name="{!! $group->id !!}" class="uk-icon-link uk-align-right uk-margin-remove preventScroll moveBtn" uk-icon="icon: move" type="button" uk-toggle="target: #modal-move-group"></a></li>
							@endif
							<li><a href="#" name="{!! $group->id !!}" class="uk-icon-link uk-align-right uk-margin-remove preventScroll shareBtn" uk-icon="icon: social" type="button" uk-toggle="target: #modal-share-group"></a></li>
							@if($group->id_owner == Auth::user()->id || $group->isSharedGroup())
								<li><a href="{{ URL::to('/deleteGroup/' . $group->id) }}" class="uk-icon-link uk-align-right uk-margin-remove" uk-icon="icon: trash"></a></li>
							@endif
							<li><a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleIconClose" uk-icon="icon: more"></a></li>
				        </ul>
				        <ul class="uk-iconnav uk-align-right toggleIconNav">
		        			<li><a href="#" class="uk-icon-link uk-margin-remove preventScroll toggleIcon" uk-icon="icon: more-vertical"></a></li>
		        			<li><a href="#" class="uk-icon-link uk-margin-remove preventScroll uk-hidden toggleIcon" uk-icon="icon: more"></a></li>
			        	</ul>
				    </div>
				@endif
		    @endif
		</div>
	</div>

	<div id="groupBtnForm{!! $group->id !!}" class="uk-padding-remove uk-margin-small-right uk-margin-remove uk-hidden togglePanel">
	@include('forms/formUpdateGroup')
	</div>
</div>
