<?php
	function breadcrumbs($group, $user){
		if ($group->id_parent == 0){
			return ("<a href='" . URL::to('/group/' . $group->id) . "' class='uk-link-reset'>" . $group->name . "</a>");
		}else{
			if ($group->isSharedGroup()){
				$conditions = ['id_user' => $user->id, 'id_group' => $group->id];
				$sharedGroup = SharedGroup::where($conditions)->first();
				$parent = Group::find($sharedGroup->id_parent);
			}else{
				$parent = Group::find($group->id_parent);
			}
			return (breadcrumbs($parent, $user) . " > <a href='" . URL::to('/group/' . $group->id ) . "' class='uk-link-reset'>" . $group->name . "</a>");
		}
	}

	$str = breadcrumbs($currentGroup, $user);
?>

<div class="uk-card uk-box-shadow-medium uk-padding-small uk-margin-bottom uk-light breadcrumbsPanel">
	<h4 class="uk-margin-remove">
		{!! $str !!}
	</h4>
</div>
