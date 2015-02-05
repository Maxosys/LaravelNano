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
       	<h3>Step 1 of 3</h3>
              <abbr class="info1_new">
             
              <ul>
               <li>
			Enter the email address associated with your Heavenly Couture account. 
                     Once you click Continue, we'll send you an email message containing a helpful 		                     personalized link<br>
                     <!--<form action="{{ URL:: action('HomeController@forgot')}}" method="post">
                     <input type="text" name="forgot" value="">
                     </form>-->
                     <?php if(isset($sucess))
					 {?>
                        	<h3>{{ $sucess }}</h3>
                     <?php 
					 }?>
                     
                     {{ Form::open(array('HomeController@forgot'))}}
                     
                    <h2> {{ Form::label('email','E-mail')}}</h2>
                     <div class="clear"></div>
                     {{Form::text('email',Input::old('email'))}}
                      <div class="clear"></div>
                     <span class="errormessage">
              {{ $errors->first('email') }}
              <?php if(isset($notvalid))
              {?>
                  {{ $notvalid }}
             <?php  }?>
              
              
             </span>
              <div class="clear"></div>
                     {{ Form::submit('Forgot!', array('class'=>'button'))}}
                      {{ Form::token() . Form::close() }}
                     
                     </li>
              <li>
              <h2> Step 2 of 3</h2>
              Check your email and open the message from It Solutions that contains the subject 			line "It solutions Password Assistance". Click on the link indicated in the message to get to Step 3. If you do not receive a message please double check that you entered the same email address you used to register. 
              </li>
              <li>
              <h2>Step 3 of 3</h2>
		Select a new password.
              </li>
              </ul>
              </abbr>
              
		<abbr class="info1_new">
             <ul><li>If you've forgotten your 
             password and can no longer use the email address that you used to create your It solution account, you can <a href="{{ URL:: to ('register') }}">create a new account.</a> 
             </li>
             
              </ul>
              </abbr>
       </div>
       
</article>
@stop