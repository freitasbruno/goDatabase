<div class="uk-animation-fade uk-hidden togglePanel">
    <ul class="uk-iconnav uk-margin-top" uk-tab>
	    <li><a href="#" uk-icon="icon: home"></a></li>
	    <li><a href="#" uk-icon="icon: mail"></a></li>
	    <li><a href="#" uk-icon="icon: phone"></a></li>
	    <li><a href="#" uk-icon="icon: world"></a></li>
	    <li><a href="#" uk-icon="icon: file-edit"></a></li>
	</ul>
	<ul class="uk-switcher">
	    <li>
	    	<div>
				<div class="uk-card uk-margin-top">
					<p class="uk-text-center">NEW ADDRESS</p>
					@include('forms/formNewAppAddress')
				</div>
			</div>
	    </li>
	    <li>
	    	<div>
				<div class="uk-card uk-margin-top">
					<p class="uk-text-center">NEW EMAIL</p>
					@include('forms/formNewAppEmail')
				</div>	
			</div>
	    </li>
	    <li>
	    	<div>
				<div class="uk-card uk-margin-top">
					<p class="uk-text-center">NEW PHONE</p>
					@include('forms/formNewAppPhone')
				</div>
			</div>
	    </li>
	    <li>
	    	<div>
				<div class="uk-card uk-margin-top">
					<p class="uk-text-center">NEW WEBSITE</p>
					@include('forms/formNewAppWebsite')
				</div>
			</div>
	    </li>
	    <li>
	    	<div>
				<div class="uk-card uk-margin-top">
					<p class="uk-text-center">NEW NOTE</p>
					@include('forms/formNewAppTextfield')
				</div>
			</div>
	    </li>
	</ul>
</div>
			
			
			
			
			