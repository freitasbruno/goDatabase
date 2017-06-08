<?php 

	function breadcrumbs($team){
		if ($team->id_parent == 0){
			return ("<a href='" . URL::to('/teams') . "' class='uk-link-reset'>" . $team->name . "</a>");
		}else{
			return (breadcrumbs(Team::find($team->id_parent)) . " > <a href='" . URL::to('/teams/' . $team->id ) . "' class='uk-link-reset'>" . $team->name . "</a>");
		}
	}
	
	$str = breadcrumbs($currentTeam);
?>

<div class="uk-card uk-box-shadow-medium uk-padding-small uk-margin-bottom uk-light breadcrumbsPanel">
	<h4 class="uk-margin-remove">
		{!! $str !!}	
	</h4>
</div>
