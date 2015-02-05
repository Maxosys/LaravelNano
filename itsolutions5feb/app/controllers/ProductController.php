<?php 
class ProductController extends BaseController {
	
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
	
	public function product($id)
	{
		$data['detail']=DB::table('laravel_products')->where('product_id',$id)->get();
	$data['color_products']=DB::table('laravel_product_color')->where('product_id',$id)->get();
	       return View::make('product.product' ,$data);
	}
	public function catproducts($id)
	{
		
		$product = new Product;
		$allUsers = Product::paginate(2);
		$data['category']=DB::table('laravel_product_category')->get();
		$data['catname']=DB::table('laravel_product_category')->where('cate_id',$id)->get();
		$data['products']=DB::table('laravel_products')->where('category_id',$id)->paginate(2);
		
		$data['notfound']='No Products Available';
		return View::make('allproducts' ,$data);
		
	}
	
	
	public function allnewproducts()
	{
		
		$product = new Product;
		$allUsers = Product::paginate(6);
		$data['category']=DB::table('laravel_product_category')->get();
		$data['new']='New Products';
		$data['products'] =DB::table('laravel_products')->paginate(6);
		$data['notfound']='No Products Available';
		return View::make('allproducts',$data);
	}
	
	
	public function allspecialproducts()
	{
	$data['category']=DB::table('laravel_product_category')->get();
	$data['special']='Special Products';
	$data['products']=DB::table('laravel_products')->where('product_type','featured')->get();				       $data['notfound']='No Products Available';
	return View::make('allproducts',$data);
	}
	
	public function cart()
	{
	     
	      $session_id = Session::getId();
	      $data['temporder']=DB::table('laravel_tmporder')->where('session_id',$session_id)->get();
	      return View::make('cart')->with($data);
	}
	public function addtocart()
	{
		
		if (Request::ajax())
		{
		 
    	      	$id=$_GET['id'];
	     	DB::table('laravel_tmporder')->where('temp_id',$id)->delete();
	       $session_id = Session::getId();
	      $data['temporder']=DB::table('laravel_tmporder')->where('session_id',$session_id)->get();
	      return $data; 
		}
		
		
		$product = new Product;
		$session_id = Session::getId();
		
		$product->setTable('laravel_tmporder');
		
		if(Request::isMethod('post'))
		{
						
			
			$id=$_POST['id'];
			$rules=array(
			'quantity'=>'required|numeric'
			);
			$validation = Validator::make(Input::all(), $rules);
			if($validation->fails())
			{
			
			$data['detail']=DB::table('laravel_products')->where('product_id',$id)->get();
			return View::make('product.product')
			->withErrors($validation)
			->with($data);
			}
			else
			{
				$postdata['data']=$_POST;
				$quantity_price=($_POST['quantity']*$_POST['price']);
				$image=explode(',',$_POST['image']);
				$product->product_id = $id;
				$product->session_id =$session_id ;
				$product->quantity =$_POST['quantity'];
				$product->single_price =$_POST['price'];
				$product->quantity_price =$quantity_price;
				$product->temp_date=date('created_at');
				$product->temp_status='y';
				$product->pro_image=$image[0];
				$product->pro_name=$_POST['name'];
				$product->pro_desc=$_POST['description'];
				$product->save();
				
			}
			
		}
	
	return Redirect::to('cart'); 

	}
	
	
	
	
	
}?>