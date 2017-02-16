<?php

namespace App\Http\Controllers;

use Validator;
use Redirect;
use Request;
use Session;
use Input;
use User;
use Item;
use AppFile;

class AppFileController extends Controller {
	
  public function create() {
    
	$user = User::find(session()->get('user_id'));
	
	$item_id = Input::get('item_id');
	
    // getting all of the post data
    $files = Input::file('upload');

    if ($files[0] != null){
    	
    	// Making counting of uploaded images
	    $file_count = count($files);
	    
	    // start count how many uploaded
	    $uploadcount = 0;
    
	    foreach($files as $file) {
	      $rules = array(); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
	      $validator = Validator::make(array('file'=> $file), $rules);
	      if($validator->passes()){
	        $destinationPath = 'uploads';
	        $originalName = $file->getClientOriginalName();
	        $extension = $file->getClientOriginalExtension();
	        if ($uploadcount == 0){
	        	$filename = 'attachement'.$item_id.'.'.$extension;
	        }else{
	        	$filename = 'attachement'.$item_id.'_'.$uploadcount.'.'.$extension;
	        }
	        
	        $upload_success = $file->move($destinationPath, $filename);
	        $uploadcount ++;
	        
	        $uploadedFile = new AppFile;
	        $uploadedFile->id_parent = $item_id;
			$uploadedFile->name = $filename;
			$uploadedFile->originalName = $originalName;
			$uploadedFile->extension = $extension;
	        $uploadedFile->save();
	      }
	    }
	    if($uploadcount == $file_count){
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
    	$app = AppFile::destroy($id);
        return back();
    }
	
}
