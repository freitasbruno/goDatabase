<?php

namespace App\Models\ItemTypes;

use Illuminate\Database\Eloquent\Model;
use Item;

class ItemDocument extends Item
{
	
    /**
     * The AppModel types that can be nested in this item type.
     *
     * @var array
     */
    public static $appModels = array(
    	'AppImage' => 'Image',
        'AppTextarea' => 'Text'
    );
    
    public static $icons = array(
        'AppImage' => 'image', 
        'AppTextarea' => 'file-edit'
    );

}
