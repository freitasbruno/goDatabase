<?php
	function breadcrumbs($group, $user){
		if ($group->id_parent == 0){
			return ("<a href='" . URL::to('/groups/' . $group->id) . "' class='uk-link-reset'>" . $group->name . "</a>");
		}else{
			if ($group->isSharedGroup()){
				$conditions = ['id_user' => $user->id, 'id_group' => $group->id];
				$sharedGroup = SharedGroup::where($conditions)->first();
				$parent = Group::find($sharedGroup->id_parent);
			}else{
				$parent = Group::find($group->id_parent);
			}
			return (breadcrumbs($parent, $user) . " > <a href='" . URL::to('/groups/' . $group->id ) . "' class='uk-link-reset'>" . $group->name . "</a>");
		}
	}

	$str = breadcrumbs($currentGroup, $user);
?>
<div class="uk-navbar-container uk-navbar-transparent uk-box-shadow-medium uk-light breadcrumbsPanel" uk-navbar>
    <div class="uk-navbar-left uk-padding-small uk-text-large">
		{!! $str !!}
    </div>

   <div class="uk-navbar-right">
        <div>
            <a class="uk-navbar-toggle" uk-search-icon href="#"></a>
            <div class="uk-drop" uk-drop="mode: click; pos: left-center; offset: 0">
                <form class="uk-search uk-search-navbar uk-width-1-1">
                    <input class="uk-search-input" type="search" placeholder="Search..." autofocus>
                </form>
            </div>
        </div>
    </div>
</div>
{{--
<div class="uk-card uk-box-shadow-medium uk-padding-small uk-margin-bottom uk-light breadcrumbsPanel">
	<h4 class="uk-margin-remove">
		{!! $str !!}
	</h4>
</div>
--}}
