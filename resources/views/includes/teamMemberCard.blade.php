<div>
    <div class="uk-card uk-card-default uk-card-hover uk-margin-small uk-box-shadow-medium itemCard">
    	<div class="uk-card-header uk-padding-remove toggleWrapper">
	    	<div class="uk-grid-small uk-flex-middle togglePanel" uk-grid>
	            <div class="uk-width-auto uk-margin-left">
	                <span uk-icon="icon: user"></span>
	            </div>
	            <div class="uk-width-expand uk-padding-small">
	                <h5 class="uk-margin-remove-bottom uk-text-uppercase toggleTextEdit">{{ $user -> name }}</h5>
	            </div>
	            @if($user->id == auth::user()->id)
	            	<div class="uk-width-auto uk-margin-right toggleIconWrapper">
			        	<ul class="uk-iconnav uk-hidden toggleIconNav">
				            <li><a href="{{ URL::to('/exitTeam/' . $user->teamMemberId) }}" class="uk-icon-link uk-align-right uk-margin-remove" uk-icon="icon: ban"></a></li>
				        	<li><a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleIconClose" uk-icon="icon: more"></a></li>
				        </ul>
				        <ul class="uk-iconnav uk-align-right toggleIconNav">
	            			<li><a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleIcon" uk-icon="icon: more-vertical"></a></li>
	            			<li><a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll uk-hidden toggleIcon" uk-icon="icon: more"></a></li>
			        	</ul>
				    </div>
				@endif
			</div>
	    </div>
	    <div class="uk-card-body uk-padding-small uk-text-center">
        	<p>{{ $user->role }}</p>
        	<p><b>{{ Html::mailto($user->email, null, ['class' => 'uk-link-reset']) }}</b></p>
		</div>
    </div>
</div>