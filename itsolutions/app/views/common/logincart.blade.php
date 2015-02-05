<aside class="loginleft">
<ul>
<?php
$session = Session::get('key');
$sessionname = Session::get('keyname');


		
		
if(isset($session) && !empty($session))
{
	$name = $sessionname;?>
	<li><a href="{{ URL::to("logout") }}">Welcome (<?php echo $name;?>) |</a></li>
	<?php } 
	else {
		if(Route::currentRouteAction()=='HomeController@login')
		{?>
		<li class="active"><a href="{{ URL::to("login") }}">Login |</a></li>
		<?php }
		else
		{?>
		<a href="{{URL:: action('HomeController@login')}}">
              <li >Login |</li></a>
	<?php }}?>


<?php if(isset($session) && !empty($session))
{?>
	<a href="{{URL:: to("logout")}}"><li>logout</li></a>
	<?php }
	else
	{
		if(Route::currentRouteAction()=='HomeController@register')
       	{?>
       <a href="{{URL:: action('HomeController@register')}}"><li class="active">Sign Up</li></a>
       <?php } else{?>
       <a href="{{URL:: action('HomeController@register')}}"><li>Sign Up</li></a>
       <?php }?>
 <?php }
 ?>      
</ul>
</aside>
<!-----------login----------->

<aside class="cart">
<figure class="cart_pic">
<a href="#">{{HTML::image('/assets/images/cart.png')}}</a>
</figure>
<h1>Shopping Cart:  <br>

<a href="{{URl::to("cart")}}" style="text-decoration:none;">
<?php 
 $session_id=Session::getId();
$products['tmpcart']=DB::table('laravel_tmporder')->where('session_id',$session_id)->count();

if(!empty($products['tmpcart'])){
  echo $products['tmpcart'];}else{?>0<?php }?> items</a></h1>
</aside>
