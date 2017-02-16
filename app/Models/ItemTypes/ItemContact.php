<?php

namespace App\Models\ItemTypes;

use Illuminate\Database\Eloquent\Model;
use Item;

class ItemContact extends Item
{
	
    /**
     * The AppModel types that can be nested in this item type.
     *
     * @var array
     */
    public static $appModels = array(
        'AppPhone' => 'Phone', 
        'AppEmail' => 'Email', 
        'AppWebsite' => 'Website', 
        'AppAddress' => 'Address', 
        'AppTextfield' => 'Textfield'
    );
    
    public static $icons = array(
        'AppPhone' => 'phone', 
        'AppEmail' => 'mail', 
        'AppWebsite' => 'world', 
        'AppAddress' => 'home', 
        'AppTextfield' => 'file-edit'
    );
	    
    public static $appModelsSummary = array(
        'AppEmail' => 'Email', 
        'AppPhone' => 'Phone', 
        'AppWebsite' => 'Website'
    );
    
    public static $appModelsExpand = array(
        'AppTextfield' => 'Textfield',
        'AppAddress' => 'Address'
    );

}
