<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class QuestionController extends Controller
{
    
    public function question($sub_id,$std)
    {
    	return view('admin.addeditquestion',compact('sub_id','std'));
    }
    public function addquestion(Request $request)
    {
    	$message = $request->ques_exp; // Summernote input field
		
		$dom = new DomDocument();
		$dom->loadHtml( mb_convert_encoding($message, 'HTML-ENTITIES', "UTF-8"), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    
		$images = $dom->getElementsByTagName('img');
		
		
		
		// foreach <img> in the submited message
		foreach($images as $img){
			$src = $img->getAttribute('src');
			
			// if the img source is 'data-url'
			if(preg_match('/data:image/', $src)){
				
				// get the mimetype
				preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
				$mimetype = $groups['mime'];
				
				// Generating a random filename
				$filename = uniqid();
				$filepath = "/images/$filename . '.' . $mimetype";
	
				// @see http://image.intervention.io/api/
				$image = Image::make($src)
				  // resize if required
				  /* ->resize(300, 200) */
				  ->encode($mimetype, 100) 	// encode file to the specified mimetype
				  ->save(public_path($filepath));
				
				$new_src = asset($filepath);
				$img->removeAttribute('src');
				$img->setAttribute('src', $new_src);
			} // <!--endif
		} // <!--endforeach
		
		$post->message = $dom->saveHTML();
		$post->save();
    }
    public function upload_image(ImageRequest $request)
	{
	    if($request->hasFile('image')){
	        $filename = str_random(20).'_'.$request->file('image')->getClientOriginalName();
	        $image_path = base_path() . '/public/images/thread/';
	        $request->file('image')->move(
	            $image_path, $filename
	        );
	        echo $filename;    
	    }
	    else{
	        echo 'Oh No! Uploading your image has failed.';
	    }
	}
    
}
