<?php

class AdminController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function adminhome()
	{ 
		if(Request::isMethod('post'))
		{
			//print_r($_REQUEST);
			//exit;
			$rules=array(
			'username'=>array('required'),
			'password'=>array('required')
			);
			
			$validation = Validator::make(Input::all(), $rules);
		
			if ($validation->fails())
			{
				$data['errors'] = $validation->messages();
				return View::make('admin.index',$data);
			}
			
			$values= array(
			'username'=>Input::get('username'),
			'password'=>Input::get('password')
			);
			
			
			$details=DB::table('laravel_tb_admin')->where('username',$values['username'])->where('password',$values['password'])->get();
			
			/*echo "<pre>";
			print_r($details);
			exit;*/
			if (!empty($details)) {
			//echo "valid";
			$sessdata=array(
			'id'=>$details[0]->admin_id,
           		'username' => $details[0]->username,
			'email'=>$details[0]->email
		   
		 	  );
				
				Session::put('adminsession', $sessdata);
				return Redirect::to('dashboard');
			
        } else {
            //echo "Wrong";
			//exit;
			//return Redirect::to('admin.index')->withInput()->with('fail','Invalid Username or Password.');
			$data['fail']="Invalid Username or Password!";
			return View::make('admin.index',$data);
        }
		}
		
		
		$session = Session::get('adminsession');
		if(isset($session) && !empty($session))
		{
			//return View::make('admin.innerpages.dashboard');
			return Redirect::to('dashboard');
		}
		else
		{
		  return View::make('admin.index');
		}
	}


public function dashboard()
{
	$session = Session::get('adminsession');
		if(isset($session) && !empty($session))
		{
			//$data['order'] = DB::table('laravel_order')->join('laravel_products', 'laravel_order.product_id','=','laravel_products.product_id')->get();
			
		   $data['order']=DB::table('laravel_order')->join('laravel_tmporder', 'laravel_tmporder.user_id','=','laravel_order.user_id')->groupby('laravel_order.user_id')->distinct('user_id')->get();

	       return View::make('admin.innerpages.dashboard',$data);
		}
		else
		{
			return View::make('admin.index');
		}
}


public function users()
{
	$session = Session::get('adminsession');
		if(isset($session) && !empty($session))
		{
			$data['user']=DB::table('laravel_users')->get();

	       return View::make('admin.innerpages.users',$data);
		}
		else
		{
			return View::make('admin.index');
		}
}


public function logout()
{
	Session::flush();
	return View::make('admin.index');
}
public function changepwd()
{
	 $session = Session::get('adminsession');
	 
	if(Request::isMethod('post'))
	{
		$rules=array(
			'username'=>array('required'),
			'password'=>array('required', 'min:8')
			);
			
			$validation = Validator::make(Input::all(), $rules);
		
			if ($validation->fails())
			{
				$data['errors'] = $validation->messages();
				
				
		       return View::make('admin.innerpages.changepwd',$data);
			}
			
			$values= array(
			'username'=>Input::get('username'),
			'password'=>Input::get('password')
			);
			
			
			DB::table('laravel_tb_admin')->where('admin_id', $session['id'])->update(array('username'=>$values['username'],'password'=>$values['password']));
			
			$data['msg']="Your username and password is successfully updated.";
			return View::make('admin.innerpages.changepwd',$data);
	}
	   
		if(isset($session) && !empty($session))
		{
	        return View::make('admin.innerpages.changepwd');
		}
		else
		{
			return View::make('admin.index');
		}
}
public function addcategory()
{
	    $session = Session::get('adminsession');
		if(isset($session) && !empty($session))
		{
			
			$data['category']=DB::table('laravel_product_category')->get();
			
			if(Request::isMethod('post'))
			{
				//print_r($_REQUEST);
				//exit;
				$rules=array(
				'cate_name'=>array('required'),
				'metatag'=>array('required'),
				'discription'=>array('required')
				);
			$validation = Validator::make(Input::all(), $rules);
		
			if ($validation->fails())
			{
				$data['errors'] = $validation->messages();
				
				
		       return View::make('admin.innerpages.addcategory',$data);
			}
			
			$values= array(
			'cate_name'=>Input::get('cate_name'),
			'metatag'=>Input::get('metatag'),
			'discription'=>Input::get('discription')
			);	
			
			DB::table('laravel_product_category')->insert(array('cate_name'=>$values['cate_name'],'mata_tag'=>$values['metatag'],'discription'=>$values['discription']));	
			
			$data['category']=DB::table('laravel_product_category')->get();
				$data['sucess']="New category is successfully added";
				return View::make('admin.innerpages.addcategory', $data);
			
			}
			
			
			
	       return View::make('admin.innerpages.addcategory', $data);
		}
		else
		{
			return View::make('admin.index');
		}
}

public function showproducts()
{
	      $session = Session::get('adminsession');
		
		if(isset($session) && !empty($session))
		{
		 //$admin = new Admin;
		 //$allUsers = Admin::paginate(2);
		//$data['category']=DB::table('laravel_product_category')->get();
		//$data['catname']=DB::table('laravel_product_category')->where('cate_id',$id)->get();
		//$data['products']=DB::table('laravel_products')->where('category_id',$id)->paginate(2);
		    
		
		 $data['products'] = DB::table('laravel_products')->join('laravel_product_category', 'laravel_products.category_id','=','laravel_product_category.cate_id')->get();
		 //$data['products'] = DB::table('laravel_products')->paginate(2);
		 
		
		
			//pagination::slider;
	       // $data['products']=DB::table('laravel_products')->join('laravel_product_category', 'laravel_products.category_id','=','laravel_product_category.cate_id')->paginate(2);
		   
	       return View::make('admin.innerpages.products',$data);
		}
		else
		{
			return View::make('admin.index');
		}
}
public function insertproduct()
{
	//include('SimpleImage.php');
			$data['category']=Admin::get_category();
		if(Request::isMethod('post'))
	{
		
		$rules= array(
		'product_price'=>'required|numeric',
		'product_quantity'=>'required|numeric',
		'product_model'=>'required',
		'product_discription'=>'required',
		'product_status'=>'required',
		'category_name'=>'required',
		'product_type'=>'required'
		);
		
		
		$validation = Validator::make(Input::all(), $rules);
		
			if ($validation->fails())
			{
				$data['errors'] = $validation->messages();
				
				//print_r($data['errors']);
				//exit;
		       return View::make('admin.innerpages.addproducts',$data);
			}
		/*echo "<pre>";
		print_r($_FILES);
		exit;*/
		$filename=array();
		$thumb_file=array();
		$mid_file=array();
		$destinationPath='public/uploads';
		//it will check the image file either it exist or not 
		if (Input::hasFile('front_view'))
		{
		     
		 $file=Input::file('front_view');
		
		 $front_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
		
		Input::file('front_view')->move($destinationPath, $front_file);
		$thumb_file[]='thumb_'.$front_file;
		$mid_file[]='mid_'.$front_file;
		$filename[]=$front_file;
		
		
		}
		
		if (Input::hasFile('left_view'))
		{
		     
		 $file=Input::file('left_view');
		
		 $left_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
		
		Input::file('left_view')->move($destinationPath, $left_file);
		$thumb_file[]='thumb_'.$left_file;
		$mid_file[]='mid_'.$left_file;
		$filename[]=$left_file;
		
		
		}
		if (Input::hasFile('right_view'))
		{
		     
		 $file=Input::file('right_view');
		
		 $right_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
		
		Input::file('right_view')->move($destinationPath, $right_file);
		$thumb_file[]='thumb_'.$right_file;
		$mid_file[]='mid_'.$right_file;
		
		$filename[]=$right_file;
		
		
		}
		if (Input::hasFile('back_view'))
		{
		     
		 $file=Input::file('back_view');
		
		 $back_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
	
		Input::file('back_view')->move($destinationPath, $back_file);
		$thumb_file[]='thumb_'.$back_file;
		$mid_file[]='mid_'.$back_file;
		$filename[]=$back_file;
		
		
		}
		//print_r($mid_file);
		//exit;
		foreach($filename as $key=>$val)
		{
			
		$file = 'public/uploads/'.$filename[$key];
      
        //indicate the path and name for the new resized file
        $resizedFile = 'public/uploads/thumb/'.$thumb_file[$key];
		$resize_mid='public/uploads/mid/'.$mid_file[$key];
      
        //call the function
        $this->smart_resize_image($file , 100 , 100 , false , $resizedFile , false , false ,100 );
		$this->smart_resize_image($file , 300 , 300 , false , $resize_mid , false , false ,100 );
				}
		
		//echo $size = Input::file('product_image')->getSize();
		//exit;
		if(!empty($filename))
		{
		$filenm=implode($filename,',');
		}
		else
		{
			$filenm='';
		}
		
		$value = array(
		'product_image'=>$filenm,
		'name'=>Input::get('product_name'),
		'price'=>Input::get('product_price'),
		'quantity'=>Input::get('product_quantity'),
		'model'=>Input::get('product_model'),
		'discription'=>Input::get('product_discription'),
		'status'=>Input::get('product_status'),
		'category_id'=>Input::get('category_name'),
		'status'=>Input::get('product_status'),
		'product_type'=>Input::get('product_type')
		);
		
		
		
		if(isset($value))
		{
		Admin::insert_product($value);
		}
		
		//return View::make('admin.innerpages.products');
		return Redirect::action('AdminController@showproducts');
		//return Redirect::to_action('AdminController@showproducts'); 
	}

        $session = Session::get('adminsession');
		if(isset($session) && !empty($session))
		{
	      return View::make('admin.innerpages.addproducts', $data);
		  }
		else
		{
			return View::make('admin.index');
		}
}



/***********************functions for image resizing start******************************/

function smart_resize_image($file,
                              $width              = 0, 
                              $height             = 0, 
                              $proportional       = false, 
                              $output             = 'file', 
                              $delete_original    = true, 
                              $use_linux_commands = false,
  							  $quality = 100
  		 ) {
      
    if ( $height <= 0 && $width <= 0 ) return false;

    # Setting defaults and meta
    $info                         = getimagesize($file);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
	$cropHeight = $cropWidth = 0;


    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );

      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
	  $widthX = $width_old / $width;
	  $heightX = $height_old / $height;
	  
	  $x = min($widthX, $heightX);
	  $cropWidth = ($width_old - $width * $x) / 2;
	  $cropHeight = ($height_old - $height * $x) / 2;
    }

	//print_r($info);
	//echo $info[2];
    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_JPEG:  $image = imagecreatefromjpeg($file);  break;
      case IMAGETYPE_GIF:   $image = imagecreatefromgif($file);   break;
      case IMAGETYPE_PNG:   $image = imagecreatefrompng($file);   break;
      default: return false;
    }
    
    
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);
      $palletsize = imagecolorstotal($image);

      if ($transparency >= 0 && $transparency < $palletsize) {
        $transparent_color  = imagecolorsforindex($image, $transparency);
        $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
	
	
    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }

    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    
    # Writing image according to type to the output destination and image quality
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
      case IMAGETYPE_PNG:
        $quality = 9 - (int)((0.9*$quality)/10.0);
        imagepng($image_resized, $output, $quality);
        break;
      default: return false;
    }

    return true;
  }
/***********************functions for image resizing close******************************/


public function edit_product($id)
{
	
$session = Session::get('adminsession');
if(isset($session) && !empty($session))
{
	$data['pro_data']=DB::table('laravel_products')->where('product_id',$id)->get();
	
	$data['category']=DB::table('laravel_product_category')->get();
	
	if(Request::isMethod('post'))
	{
		
		$id=Input::get('pro_id');
		
		$rules= array(
		'product_price'=>'required|numeric',
		'product_quantity'=>'required|numeric',
		'product_model'=>'required',
		'product_discription'=>'required',
		'product_status'=>'required',
		'category_name'=>'required',
		'product_type'=>'required'
		);
		
		
		$validation = Validator::make(Input::all(), $rules);
		
			if ($validation->fails())
			{
				$data['errors'] = $validation->messages();
				
				//print_r($data['errors']);
				//exit;
		       return View::make('admin.innerpages.addproducts',$data);
			}
		/*echo "<pre>";
		print_r($_FILES);
		exit;*/
		$filename=array();
		$thumb_file=array();
		$mid_file=array();
		$destinationPath='public/uploads';
		//it will check the image file either it exist or not 
		if (Input::hasFile('front_view'))
		{
		     
		 $file=Input::file('front_view');
		
		 $front_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
		
		Input::file('front_view')->move($destinationPath, $front_file);
		$thumb_file[]='thumb_'.$front_file;
		$mid_file[]='mid_'.$front_file;
		$filename[]=$front_file;
		
		
		}
		
		if (Input::hasFile('left_view'))
		{
		     
		 $file=Input::file('left_view');
		
		 $left_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
		
		Input::file('left_view')->move($destinationPath, $left_file);
		$thumb_file[]='thumb_'.$left_file;
		$mid_file[]='mid_'.$left_file;
		$filename[]=$left_file;
		
		
		}
		if (Input::hasFile('right_view'))
		{
		     
		 $file=Input::file('right_view');
		
		 $right_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
		
		Input::file('right_view')->move($destinationPath, $right_file);
		$thumb_file[]='thumb_'.$right_file;
		$mid_file[]='mid_'.$right_file;
		
		$filename[]=$right_file;
		
		
		}
		if (Input::hasFile('back_view'))
		{
		     
		 $file=Input::file('back_view');
		
		 $back_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
	
		Input::file('back_view')->move($destinationPath, $back_file);
		$thumb_file[]='thumb_'.$back_file;
		$mid_file[]='mid_'.$back_file;
		$filename[]=$back_file;
		
		
		}
		//print_r($mid_file);
		//exit;
		foreach($filename as $key=>$val)
		{
			
		$file = 'public/uploads/'.$filename[$key];
      
        //indicate the path and name for the new resized file
        $resizedFile = 'public/uploads/thumb/'.$thumb_file[$key];
		$resize_mid='public/uploads/mid/'.$mid_file[$key];
      
        //call the function
        $this->smart_resize_image($file , 100 , 100 , false , $resizedFile , false , false ,100 );
		$this->smart_resize_image($file , 300 , 300 , false , $resize_mid , false , false ,100 );
				}
		
		//echo $size = Input::file('product_image')->getSize();
		//exit;
		if(!empty($filename))
		{
		    $filenm=implode($filename,',');
			$value = array(
		
		'product_image'=>$filenm,
		'name'=>Input::get('product_name'),
		'price'=>Input::get('product_price'),
		'quantity'=>Input::get('product_quantity'),
		'model'=>Input::get('product_model'),
		'discription'=>Input::get('product_discription'),
		'status'=>Input::get('product_status'),
		'category_id'=>Input::get('category_name'),
		'status'=>Input::get('product_status'),
		'product_type'=>Input::get('product_type')
		
		);
		}
		else
		{
			$value = array(
		
		'name'=>Input::get('product_name'),
		'price'=>Input::get('product_price'),
		'quantity'=>Input::get('product_quantity'),
		'model'=>Input::get('product_model'),
		'discription'=>Input::get('product_discription'),
		'status'=>Input::get('product_status'),
		'category_id'=>Input::get('category_name'),
		'status'=>Input::get('product_status'),
		'product_type'=>Input::get('product_type')
		
		);
		}
		
		
		
		
		
		if(isset($value))
		{
			
		Admin::update_product($value,$id);
		}
		
		//return View::make('admin.innerpages.products');
		return Redirect::action('AdminController@showproducts');
	}
	
	
	
	
	return View::make('admin.innerpages.addproducts', $data);
}
else
{
	return Redirect::to('admin');
}
}


public function delete_product($id)
{
	$session = Session::get('adminsession');
if(isset($session) && !empty($session))
{
	DB::table('laravel_products')->where('product_id',$id)->delete();
	return Redirect::action('AdminController@showproducts');
	
}
else
{
	return Redirect::to('admin');
}
}


public function approve_product($id)
{
	$session = Session::get('adminsession');
if(isset($session) && !empty($session))
{
	$value=array(
	'status'=>'active',
	);
	
	DB::table('laravel_products')->where('product_id',$id)->update($value);
	return Redirect::action('AdminController@showproducts');
	
}
else
{
	return Redirect::to('admin');
}
}

public function reject_product($id)
{
	
$session = Session::get('adminsession');
if(isset($session) && !empty($session))
{
	$value=array(
	'status'=>'inactive',
	);
	
	DB::table('laravel_products')->where('product_id',$id)->update($value);
	return Redirect::action('AdminController@showproducts');
}
else
{
	return Redirect::to('admin');
}
}

public function edit_category($id)
{
$session = Session::get('adminsession');
if(isset($session) && !empty($session))
{
	$data['catg']=DB::table('laravel_product_category')->where('cate_id',$id)->get();
	$data['category']=DB::table('laravel_product_category')->get();
	
	if(Request::isMethod('post'))
	{
		//echo $id;
		//die;
		$rules=array(
				'cate_name'=>array('required'),
				'metatag'=>array('required'),
				'discription'=>array('required')
				);
				
			//$id=Input::get('cat_id');
			$validation = Validator::make(Input::all(), $rules);
		
			if ($validation->fails())
			{
				$data['errors'] = $validation->messages();
		        return View::make('admin.innerpages.addcategory', $data);
			}
			
			$values= array(
			'cate_name'=>Input::get('cate_name'),
			'mata_tag'=>Input::get('metatag'),
			'discription'=>Input::get('discription')
			);
			
			DB::table('laravel_product_category')->where('cate_id',$id)->update($values);
			
			return Redirect::to('admin_category');
	}
	
	return View::make('admin.innerpages.addcategory', $data);
}
else
{
	return Redirect::to('admin');
}
}
public function delete_category($id)
{
$session = Session::get('adminsession');
if(isset($session) && !empty($session))
{
	DB::table('laravel_product_category')->where('cate_id',$id)->delete();
	return Redirect::to('admin_category');
}
else
{
	return Redirect::to('admin');
}
}
public function approve_user($id)
{
$session = Session::get('adminsession');
if(isset($session) && !empty($session))
{
	$value=array(
	'active'=>'y'
	);
	DB::table('laravel_users')->where('user_id',$id)->update($value);
	return Redirect::to('adminusers');
}
else
{
	return Redirect::to('admin');
}
}
public function reject_user($id)
{
	
	$session = Session::get('adminsession');
if(isset($session) && !empty($session))
{
	$value=array(
	'active'=>'n'
	);
	DB::table('laravel_users')->where('user_id',$id)->update($value);
	return Redirect::to('adminusers');
}
else
{
	return Redirect::to('admin');
}
}

public function delete_user($id)
{
	$session = Session::get('adminsession');
if(isset($session) && !empty($session))
{
	DB::table('laravel_users')->where('user_id',$id)->delete();
	return Redirect::to('adminusers');
}
else
{
	return Redirect::to('admin');
}
}

public function group_action()
{
	$session = Session::get('adminsession');
if(isset($session) && !empty($session))
{
	if(isset($_REQUEST['action']) && $_REQUEST['action']=="approve")
	{
		$value=array(
		'active'=>'y'
		);
		$ids=$_REQUEST;
		foreach($ids as $key=>$val)
		{
			DB::table('laravel_users')->where('user_id',$ids[$key])->update($value);
			
		}
			return Redirect::to('adminusers');
	}
	elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="reject")
	{
		$value=array(
		'active'=>'n'
		);
		$ids=$_REQUEST;
		foreach($ids as $key=>$val)
		{
			DB::table('laravel_users')->where('user_id',$ids[$key])->update($value);
			
		}
			return Redirect::to('adminusers');
			
	}
	elseif(isset($_REQUEST['action']) && $_REQUEST['action']=="delete")
	{
		
		$ids=$_REQUEST;
		foreach($ids as $key=>$val)
		{
			DB::table('laravel_users')->where('user_id',$ids[$key])->delete();
			
		}
			return Redirect::to('adminusers');
			
	}
}
else
{
	return Redirect::to('admin');
}
}

public function forgot_pwd()
{
	$data['forgot_form']="forgot";
	
	if(Request::isMethod('post'))
	{
		   $rules=array(
			'email'=>array('required','email')
			);
			
			$validation = Validator::make(Input::all(), $rules);
		
			if ($validation->fails())
			{
				$data['errors'] = $validation->messages();
				return View::make('admin.index',$data);
			}
			
			$values= array(
			'email'=>Input::get('email')
			);
			
			
			$check=DB::table('laravel_tb_admin')->where('email',$values['email'])->get();
			
			if(!empty($check))
			{
			   $tokan=md5($check[0]->password).'<br>';
			   $tokan=substr($tokan,6,8);
			  
			
			
			
			$update=array(
			'tokan'=>$tokan
			);
			
			$message=array('email'=>$check[0]->email);
			
			DB::table('laravel_tb_admin')->where('admin_id',$check[0]->admin_id)->update($update);
			
			
			
			
			//return View::make('admin.emails.forgotpwd',$update);
			$contactEmail=$check[0]->email;
			$data = array('email'=>$contactEmail, 'tokan'=>$update['tokan']);
			Mail::send('admin.emails.forgotpwd', $data, function($message) use ($contactEmail)
			{   
				$message->from($contactEmail, 'Admin');
				$message->to($contactEmail, 'Admin')->subject('Reset your password');
			});
	
	
			
			$data['sucess']="Check your inbox to get the instruction for reseting the password";
			$data['forgot_form']="forgot";
			return View::make('admin.index',$data);
			
			}
			else
			{
				$data['notvalid'] = "E-mail id does not exist.";
				return View::make('admin.index',$data);
			}
			
	}
	
	
	return View::make('admin.index', $data);
	
}

public function reset_password()
{
	if(Request::isMethod('post'))
	{
		//print_r($_REQUEST);
		//exit;
		
		$rules=array(
		'tokan'=>array('required'),
		'new_password'=>array('required','min:6'),
		'confirm_new_password'=>'required|same:new_password'
		);
		
		$validation = Validator::make(Input::all(), $rules);
		
		if ($validation->fails())
		{
			
			$data['errors'] = $validation->messages();
			//print_r($data['errors']);
			//exit;
			return View::make('admin.reset_pwd',$data);
		}
		
		$value=array(
		'tokan'=>Input::get('tokan'),
		'password'=>Input::get('new_password')
		);
		
		//print_r($value);
		//exit;
		$check=DB::table('laravel_tb_admin')->where('tokan',$value['tokan'])->get();
		
		if(!empty($check))
		{
			$update= array('password'=>$value['password']);
			
			DB::table('laravel_tb_admin')->where('tokan',$value['tokan'])->update($update);
			$msg['sucess']="Your password is sucessfully reset, you can login with your new password now.";
			return View::make('admin.reset_pwd',$msg);
		}
		else
		{
			$msg['fail']="Tokan number provided by you is invalid.";
			return View::make('admin.reset_pwd',$msg);
		}
	}
	return View::make('admin.reset_pwd');
}


public function havecolor()
{
	$data['products']=DB::table('laravel_products')->join('laravel_product_category', 'laravel_products.category_id','=','laravel_product_category.cate_id')->get();
	
	return View::make('admin.innerpages.show_productcolor', $data);
	
}

public function edit_productcolor($pro_id=NULL,$cate_id=NULL)
{
	$data['pro_id']= $pro_id;
	$data['cate_id']= $cate_id;
	//exit;
	
	if(Request::isMethod('post'))
	{
		//print_r($_REQUEST);
		//print_r($_FILES);
		//exit;
		
		
		$filename=array();
		$thumb_file=array();
		$mid_file=array();
		$destinationPath='public/uploads';
		//it will check the image file either it exist or not 
		if (Input::hasFile('front_view'))
		{
		     
		 $file=Input::file('front_view');
		
		 $front_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
		
		Input::file('front_view')->move($destinationPath, $front_file);
		$thumb_file[]='thumb_'.$front_file;
		$mid_file[]='mid_'.$front_file;
		$filename[]=$front_file;
		
		
		}
		
		if (Input::hasFile('left_view'))
		{
		     
		 $file=Input::file('left_view');
		
		 $left_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
		
		Input::file('left_view')->move($destinationPath, $left_file);
		$thumb_file[]='thumb_'.$left_file;
		$mid_file[]='mid_'.$left_file;
		$filename[]=$left_file;
		
		
		}
		if (Input::hasFile('right_view'))
		{
		     
		 $file=Input::file('right_view');
		
		 $right_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
		
		Input::file('right_view')->move($destinationPath, $right_file);
		$thumb_file[]='thumb_'.$right_file;
		$mid_file[]='mid_'.$right_file;
		
		$filename[]=$right_file;
		
		
		}
		if (Input::hasFile('back_view'))
		{
		     
		 $file=Input::file('back_view');
		
		 $back_file= time().$file->getClientOriginalName();//it will return image name
		//exit;
		//$extension = Input::file('product_image')->getClientOriginalExtension();
	
		Input::file('back_view')->move($destinationPath, $back_file);
		$thumb_file[]='thumb_'.$back_file;
		$mid_file[]='mid_'.$back_file;
		$filename[]=$back_file;
		
		
		}
		//print_r($mid_file);
		//exit;
		foreach($filename as $key=>$val)
		{
			
				$file = 'public/uploads/'.$filename[$key];
			  
				//indicate the path and name for the new resized file
				$resizedFile = 'public/uploads/thumb/'.$thumb_file[$key];
				$resize_mid='public/uploads/mid/'.$mid_file[$key];
			  
				//call the function
				$this->smart_resize_image($file , 100 , 100 , false , $resizedFile , false , false ,100 );
				$this->smart_resize_image($file , 300 , 300 , false , $resize_mid , false , false ,100 );
		}
		
		//echo $size = Input::file('product_image')->getSize();
		//exit;
		if(!empty($filename))
		{
		$filenm=implode($filename,',');
		}
		else
		{
			$filenm='';
		}
		
		$value = array(
		'category_id'=>$cate_id,
		'product_id'=>$pro_id,
		'images'=>$filenm,
		'color_name'=>Input::get('clr_name')
		);
		
		
		
		if(isset($value))
		{
		DB::table('laravel_product_color')->insert($value);
		}
		
		return Redirect::to('adminhavecolor');
	}
	return View::make('admin.innerpages.add_productcolor', $data);
}

}