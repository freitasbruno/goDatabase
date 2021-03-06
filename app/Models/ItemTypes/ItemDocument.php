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
    	'AppFile' => 'File',
        'AppTextarea' => 'Text'
    );
    
    public static $icons = array(
        'AppImage' => 'image', 
        'AppFile' => 'file',
        'AppTextarea' => 'file-edit'
    );

}
