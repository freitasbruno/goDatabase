<div class="toggleWrapper">
	<div class="uk-card uk-padding-small uk-visible-toggle togglePanel groupBtn">
		<div uk-grid>
			<div class="uk-width-expand uk-text-bold toggleTextEdit">
				<a href="/group/{{ $group->id }}" class="uk-link-reset">
					{!! $group->name !!}
				</a>
			</div>
		    <div class="uk-width-auto">
		        <ul class="uk-hidden-hover uk-iconnav uk-light">
		        	<li><a href="#" id="editBtn{!! $group->id !!}" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover preventScroll toggleBtn" uk-icon="icon: pencil"></a></li>
		        	<li><a href="#" name="{!! $group->id !!}" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover preventScroll moveBtn" uk-icon="icon: move" type="button" uk-toggle="target: #modal-move-group"></a></li>
		            <li><a href="/deleteGroup/{!! $group->id !!}" class="uk-icon-link uk-align-right uk-margin-remove uk-invisible-hover" uk-icon="icon: trash"></a></li>
		        </ul>
		    </div>
		</div>
	</div>
	
	<div id="groupBtnForm{!! $group->id !!}" class="uk-padding-remove uk-margin-small-right uk-margin-remove uk-hidden togglePanel">
	@include('forms/formUpdateGroup')
	</div>
</div>