<?php

namespace App\Models\ItemTypes;

use Illuminate\Database\Eloquent\Model;
use Item;

class ItemTaskList extends Item
{
	
    /**
     * The AppModel types that can be nested in this item type.
     *
     * @var array
     */
    public static $appModels = array(
        'AppTextfield' => 'Textfield'
    );

}
