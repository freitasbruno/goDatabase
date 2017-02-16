<?php

namespace App\Http\Controllers;

use Validator;
use Redirect;
use Request;
use Session;
use Input;
use User;
use Item;
use AppImage;

class AppImageController extends Controller {
	
  public function create() {
    
	$user = User::find(session()->get('user_id'));
	
	$item_id = Input::get('item_id');
	
    // getting all of the post data
    $file = Input::file('upload');

    if ($file != null){
    
      $rules = array(); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
      $validator = Validator::make(array('file'=> $file), $rules);
      if($validator->passes()){
        $destinationPath = 'uploads';
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filename = 'thumb'.$item_id.'.'.$extension;
        
        $upload_success = $file->move($destinationPath, $filename);
        
        $image = new AppImage;
		$image->id_parent = $item_id;
		$image->name = $filename;
		$image->originalName = $originalName;
		$image->extension = $extension;
        $image->save();
      }
	      
	    if($upload_success){
	      Session::flash('success', 'Upload successfully'); 
	      return back();
	    } 
	    else {
	      return back()->withInput()->withErrors($validator);
    	}
    }
    
    return back();

  }
  
  public function update($id)
    {
        return back();
    }
        
	public function delete($id)
    {
    	$app = AppImage::destroy($id);
        return back();
    }
	
}
