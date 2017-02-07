<?php 

	function breadcrumbs($group){
		if ($group->id == Auth::user()->id_home_group){
			return ("<a href='/group/" . $group->id . "' class='uk-link-reset'>" . $group->name . "</a>");
		}else{
			return (breadcrumbs(Group::find($group->id_parent)) . " > <a href='/group/" . $group->id . "' class='uk-link-reset'>" . $group->name . "</a>");
		}
	}
	
	$str = breadcrumbs($currentGroup);
?>

<div class="uk-card uk-box-shadow-medium uk-padding-small uk-margin-bottom uk-border-rounded itemTypePanel">
	<h4 class="uk-margin-remove">
		{!! $str !!}	
	</h4>
</div>
