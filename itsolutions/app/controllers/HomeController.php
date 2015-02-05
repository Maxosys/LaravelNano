 <?php

class HomeController extends BaseController {

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

	public function index()
	{
		return View::make('index');
	}
	public function login()
	{
		if(Request::isMethod('post'))
		{
			$user= new User;
			$rules=array(
			'email'=>array('required'),
			'password'=>array('required'),
			);
			
			$validation= Validator::make(Input::all(), $rules);
			if($validation->fails())
			{
				
				return View::make('login')->withErrors($validation);
			}
			else
			{
				 $email=Input::get('email');
				 $password=Input::get('password');
				 
				 
			$details=DB::table('laravel_users')->where('email',$email)->where('password',$password)->get();
			
			
			if (!empty($details)) {
			//echo "valid";
			$sessdata=array(
			'id'=>$details[0]->user_id,
           		'name' => $details[0]->name,
			'email'=>$details[0]->email
		   
		   );
			
			Session::put('key', $sessdata['id']);
			Session::put('keyname', $sessdata['name']);
			
			return View::make('created')->with('message', 'Successfully Login');
			
        }
				
	             /*if (Auth::attempt(array('email' =>$email, 'password' =>$password)))
					{
						
						if(Auth::check())
						{
						Session::put('key', Auth::user()->user_id);
						Session::put('name', Auth::user()->name);
						$name=Session::get('name');
						$user_id = Session::get('key');
						return View::make('created')->with('message', 'Successfully Login');
						}
					}*/
			else
			{
				
				return View::make('login')->with('message','Login Email or Password is not Correct');
			}
			
			
		     }
			
		}
		
		return View::make('login');
	}
	
	public function register()
	{
		
		if(Request::isMethod('post'))
		{
			
			$user = new User;
			$rules=array(
			'username'=>array('required'),
			'email'=>'required|email|unique:laravel_users,email',
			'password'=>'required|min:8',
			'cpassword'=>'required|same:password'
			);
			
			$validation = Validator::make(Input::all(), $rules);
			if ($validation->fails())
			{
				return View::make('register')->withErrors($validation);
			}
			else
			{
				if(!empty($_POST['id']))
				{
					
					if(!empty($_POST['password']))
					{
						
						
						DB::table('laravel_users')
						->where('id', $_POST['id'])
						->update(array('name' => $_POST['username'],
						'email'=>$_POST['email']
						));
						
					}
					else
					{
						
						DB::table('laravel_users')
						->where('id', $_POST['id'])
						->update(array('name' => $_POST['username'],
						'email'=>$_POST['email'],
						'password'=>$_POST['password']
						));	
					}
					
					
				}
				else
				{
				
				$user->name = $_POST['username'];
				$user->email = $_POST['email'];
				$user->password =$_POST['password'];
				$user->active ='y';
				$user->save();
				
				
				//Session::put('key', $id);
				//$username = Session::get('key');
				return View::make('created')->with('message', 'You have successfully created a new IT Solutions account.');
				}
				   
			}
			
			
		}
		
		if (Session::has('key'))
		{
   			
			$user = DB::table('laravel_users')->where('user_id',Session::has('id'))->first();
			return View::make('register')->with('userdata',$user);
		}
		
		return View::make('register');
	}
	
	
	
	public function profile()
	{
		return View::make('profile');
	}
	
	public function allproducts()
	{
		$data['category']=DB::table('laravel_product_category')->get();
		$data['products']=DB::table('laravel_products')->get();
		return View::make('allproducts', $data);
	}

	public function contact()
	{
		return View::make('contact');
	}
	public function logout()
	{
		
		
		Session::flush();
		return Redirect::to('/');
		
	}
	public function created()
	{
		return View::make('created')->with('message','Welcome to your Account');
	}
	public function forgot()
	{
		
		
		if(Request::isMethod('post'))
		{
			$rules=array(
			'email'=>array('required','email')
			);
			
			$validation = Validator::make(Input::all(), $rules);
		
			if ($validation->fails())
			{
				$data['errors'] = $validation->messages();
				return View::make('forgot',$data);
			}
			
			$values= array(
			'email'=>Input::get('email')
			);
			
			
			$check=DB::table('laravel_users')->where('email',$values['email'])->get();
			
			if(!empty($check))
			{
			   //$tokan=md5($check[0]->password);
			    $tokan=rand().time();
			   
			   $tokan=substr($tokan,3,6);
			  
			
			
			
			$update=array(
			'tokan'=>$tokan
			);
			
			$message=array('email'=>$check[0]->email);
			
			DB::table('laravel_users')->where('user_id',$check[0]->user_id)->update($update);
			
			
			
			
			//return View::make('admin.emails.forgotpwd',$update);
			$contactEmail=$check[0]->email;
			$username= $check[0]->name;
			$data = array('email'=>$contactEmail, 'tokan'=>$update['tokan'], 'name'=>$username);
			Mail::send('emails.forgotpwd', $data, function($message) use ($contactEmail, $username)
			{   
				$message->from('itsolutions@site.com', 'IT Solutions');
				$message->to($contactEmail, $username)->subject('Reset your password');
			});
	
	
			
			$data['sucess']="Check your inbox to get the instruction for reseting the password";
			
			return View::make('forgot',$data);
			
			}
			else
			{
				$data['notvalid'] = "E-mail id does not exist.";
				return View::make('forgot',$data);
			}
			
			
		}
		return View::make('forgot');
	}
	
	
	public function reset_pwd()
	{
		if(Request::isMethod('post'))
	 {
		
		
		$rules=array(
		'tokan'=>array('required'),
		'new_password'=>array('required','min:8'),
		'confirm_new_password'=>'required|same:new_password'
		);
		
		$validation = Validator::make(Input::all(), $rules);
		
		if ($validation->fails())
		{
			
			$data['errors'] = $validation->messages();
			//print_r($data['errors']);
			//exit;
			return View::make('reset_pwd',$data);
		}
		
		$value=array(
		'tokan'=>Input::get('tokan'),
		'password'=>Input::get('new_password')
		);
		
		//print_r($value);
		//exit;
		$check=DB::table('laravel_users')->where('tokan',$value['tokan'])->get();
		
		if(!empty($check))
		{
			$update= array('password'=>$value['password']);
			
			DB::table('laravel_users')->where('tokan',$value['tokan'])->update($update);
			$msg['sucess']="Your password is sucessfully reset, you can login with your new password now.";
			return View::make('reset_pwd',$msg);
		}
		else
		{
			$msg['fail']="Tokan number provided by you is invalid.";
			return View::make('reset_pwd',$msg);
		}
	}
	return View::make('reset_pwd');
	
	}
	public function shipping($id)
	{
		$product = new Product;
		$product->setTable('laravel_tmporder');
		if(Session::has('key'))
		{
			$user_id = Session::get('key');
			$user['session_id']=$id;
			$user['data'] = DB::table('laravel_users')->where('user_id',$user_id)->get();
			$user['tempdata'] = DB::table('laravel_tmporder')
			->where('user_id',$user_id)
			->where('session_id',$id)
			->get();
		
		
		
		return View::make('shipping')->with($user);
		}
		else
		{
		return View::make('login');	
		}
		
	}
	public function updatecart($id)
	{
	
			if(Session::has('key'))
			{
			$user_id = Session::get('key');
			if(Request::isMethod('post'))
				{
				$rules=array(
				'address'=>array('required'),
				'country'=>'required',
				'state'=>'required',
				'city'=>'required',
				's_address' =>'required',
				's_country' =>'required',
				's_state'=>'required',
				's_city'=>'required'
			);
			
			 $validate=Validator::make($_POST, $rules);
			 
			 if($validate->fails())
			 {
			 $user['session_id']=$id;	 
			 $user['data'] = DB::table('laravel_users')->where('user_id',$user_id)->get();
			 return View::make('shipping')
			->withErrors($validate)
			->with($user);
			 }
			 else
			 {
			 $user['data'] = DB::table('laravel_tmporder')->where('user_id',$user_id)->count(); 				
			
			
			if(!empty($user['data']))
			{
			for($i=0;$i<=count($user['data']); $i++)
			{	 
			
				DB::table('laravel_tmporder')
            			->where('session_id', $id)
           		       ->update(array(
				'user_id' =>$user_id,
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'address' => $_POST['address'],
				'country' => $_POST['country'],
				'state' => $_POST['state'],
				'city' => $_POST['city'],
				's_name' => $_POST['s_name'],
				's_email' => $_POST['s_email'],
				's_address' => $_POST['s_address'],
				's_country' => $_POST['s_country'],
				's_state' => $_POST['s_state'],
				's_city' => $_POST['s_city']
			));
				
			}
			}
			else
			{
			
			$data=DB::table('laravel_tmporder')->insert(
    			array( 
				'user_id' =>$user_id,
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'address' => $_POST['address'],
				'country' => $_POST['country'],
				'state' => $_POST['state'],
				'city' => $_POST['city'],
				's_name' => $_POST['s_name'],
				's_email' => $_POST['s_email'],
				's_address' => $_POST['s_address'],
				's_country' => $_POST['s_country'],
				's_state' => $_POST['s_state'],
				's_city' => $_POST['s_city']

			)
			);
				
			}
				
		
		
		$user['tempdata'] = DB::table('laravel_tmporder')->where('user_id',$user_id)->where('session_id',$id)->get();
			return View::make('payment',$user);
			}
		}}
			
			else
			{
				 return View::make('login');	
			}
	}
	
	public function success()
	{
		
		
		
		
		$session_id=Session::getId();
		 $user_id = Session::get('key');
		$user=DB::table('laravel_tmporder')
		->where('user_id',$user_id)
		->where('session_id',$session_id)
		->get();
		foreach($user as $pid)
		{
				$p_id[]=$pid->product_id;
				$product_id=implode(",",$p_id);
				 
					
		}
		
		
		
		
		if(Request::isMethod('post'))
		{
			
			
			
			$data=DB::table('laravel_order')->insert(
    			array( 
			'quantity' =>$_POST['quantity'],
			'transactionid' =>$_POST['txn_id'],
			'user_id' => $user_id,
			'product_id' =>$product_id,
			'total_amount' =>$_POST['mc_gross'],
			'order_status' => 1,
			)
			);
			
		//  $user['tempdata']=DB::table('laravel_tmporder')->where('user_id',$user_id)->delete();
		  return View::make('success');
			
			
	
		}
		
		
		
	}
  	public function cancel()
	{
		print_r($_REQUEST);
		die;
	}
  
}