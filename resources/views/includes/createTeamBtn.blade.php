<div class="toggleWrapper">
	<div class="uk-card uk-padding-small uk-visible-toggle togglePanel groupBtn">
		<div uk-grid>
			<div class="uk-width-expand">
				<a href="#" class="uk-link-reset preventScroll toggleBtn">
					<span class="uk-margin-small-right" uk-icon="icon: plus"></span>
					NEW TEAM
				</a>
			</div>
		</div>
	</div>
	<div class="uk-animation-fade uk-hidden togglePanel">
		<div class="uk-border-rounded createPanel">
			<div class="uk-card uk-card-body uk-padding-small">
				<a href="#" class="uk-link-reset preventScroll toggleBtn">
					<p><span uk-icon="icon: minus; ratio:0.7"></span> New Team</p>
				</a>
				<hr class="uk-divider-small">
				@include('forms/formNewTeam')
    		</div>
    	</div>		
	</div>
</div>