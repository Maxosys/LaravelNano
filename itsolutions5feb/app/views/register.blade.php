@extends('layouts.layout')
@section('slider')
@stop
@section('sidebar')
@stop
@section('main')
		<?php
		
		if(!empty($userdata))
		{
			$username=$userdata->name;
			$useremail=$userdata->email;
			$userid=$userdata->user_id;
			$password=$userdata->password;
		}
		else
		{
		       $username='';
			$useremail='';
			$userid='';
			$password='';
		}
                                   
              ?>
			
	<article class="inn_content_login">
	<div id="wrapper_1">
       <div id="login" class="animate form">
       
       <form  action="{{ URL::action('HomeController@register') }}" autocomplete="on" method="post"> 
            <h1> Sign up </h1> 
                
            <p> 
              <label for="usernamesignup" class="uname" >Your username</label>
              <input id="usernamesignup" name="username" class="sign_tbox" required type="text"  value="{{$username}}"/>
              <input type="hidden" name="id" value="<?php echo  $userid ;?>" />
              {{ $errors->first('name', '<span class="errormessage">:message</span>') }}
            </p>
                  
             <p> 
               <label for="emailsignup" class="youmail"  > Your email</label>
               <input id="emailsignup" name="email" class="email_pic" required type="email"  value="{{$useremail}}"/> 
               {{ $errors->first('email', '<span class="errormessage">:message</span>') }}
             </p>
             
              <p> 
              <label for="passwordsignup" class="youpasswd" >Your password </label>
              <input id="passwordsignup" name="password" class="password_pic" required type="password" value="" />
              {{ $errors->first('password', '<span class="errormessage">:message</span>') }}
             </p>
                               
             	<p> 
               <label for="passwordsignup_confirm" class="youpasswd" >
                Please confirm your password
                </label>
                <input id="passwordsignup_confirm" name="cpassword" class="password_pic"required type="password"  value=""/>
                {{ $errors->first('cpassword', '<span class="errormessage">:message</span>') }}
           	 </p>
                 <p class="signin button"> 
		   <input type="submit" value="Sign up" name="signup"/> 
		  </p>
               
                <p class="change_link">  
                 Already a member ?
                <a href="{{ URL::to("login") }}" class="to_register"> Go and log in </a>
                </p>
         </form>
                       
     </div>

     </div>
     </article>
@stop