<div class="toggleWrapper">
	<div class="uk-card uk-padding-small uk-visible-toggle togglePanel groupBtn {!! $team->id == session('currentTeam') ? 'selected' : false !!}">
		<div uk-grid>
			<div class="uk-width-expand uk-text-bold toggleTextEdit">
				<a href="{{ url('/teams/' . $team->id) }}" class="uk-link-reset">
					<span class="uk-margin-small-right" uk-icon="icon: users"></span>
					{!! $team->name !!}
				</a>
			</div>
		</div>
	</div>
</div>
