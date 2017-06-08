<div class="toggleWrapper">
	<div class="uk-padding-small uk-margin-bottom itemTypePanel">
		<div class="uk-card-header uk-padding-remove">
	        <h5>{!! $team->name !!}
	        <span class="uk-align-right togglePanel">
		    	<a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleBtn" uk-icon="icon: triangle-up; ratio:1.4"></a>
		    </span>
		    <span class="uk-align-right uk-hidden togglePanel">
		    	<a href="#" class="uk-icon-link uk-align-right uk-margin-remove preventScroll toggleBtn" uk-icon="icon: triangle-down; ratio:1.4"></a>
		    </span>
		    </h5>
	    </div>
		<div class="uk-card-body togglePanel">
	    	<div class="uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l" uk-grid>
	    		@include('forms/formAddTeamMember')
	    		@if (!empty($team->members()))
					@each('includes/teamMemberCard', $team->members(), 'user')
				@endif
			</div>
	    </div>
	</div>    
</div>
		    					