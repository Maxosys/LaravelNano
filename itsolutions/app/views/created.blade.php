@extends('layouts.layout')
@section('slider')
@stop
@section('sidebar')
@stop
@section('main')

	<article class="inn_content_login">
       <div class="action">
       	
              <abbr class="info1_new"> 
              <h1>Actions</h1>
            	<ul><a href="#"><li>Order History</li></a>
            	    <a href="#"><li>Returns Address Book</li></a>
             	    <a href="#"><li>Payments Settings</li></a>
               
               <a href="{{ URL::action('HomeController@register') }}">
                  <li>Account settings</li></a>
              </ul>
              </abbr>
                                                                                                                        
       
       </div>
       <div id="customer_info_new">
       	<h3>{{ $message }}</h3>
              <abbr class="info1_new">
             
              <ul>
               <li> Enjoy quick access to current and past orders, update your personal 		                information, and more! Sign in or create an account to customize your shopping 	                experience and take advantage of these great benefits:</li>
              <li>
              <h2> Faster Checkout</h2>
              There's no need to retype anything; save your billing and shipping information 				               for quick, hassle-free checkout. 
              </li>
              <li>
              <h2>Order History</h2>
		Track your orders up to the moment they arrive! Easily check the status of current 			              orders or review past orders, which are automatically saved in your account.
              </li>
              </ul>
              </abbr>
              
		<abbr class="info1_new">
              <h1>Where you want to go next?</h1>
              <ul><a href="#"><li> > Your Account Main Page</li></a>
              <a href="#"><li> > Continue Shopping on the Home Page </li></a>
              </ul>
              </abbr>
       </div>
       </article>
@stop