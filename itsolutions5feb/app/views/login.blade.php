@extends('layouts.layout')
@section('slider')
@stop
@section('sidebar')
@stop

@section('main')

<article class="inn_content_login">
	<div id="wrapper_1">
        <?php if(!empty($message))
	 {?>
         <p class="message">  {{ $message }}</p>
        <?php }?>
       
        
        <div id="login" class="animate form">
        <form  action="{{ URL::action('HomeController@login')}}" autocomplete="on" method="post"> 
         <h1>Log in</h1> 
         <p> 
         <label for="username" class="uname"  > Your email </label>
         <input id="username" name="email" required type="text" placeholder="Username" class="sign_tbox"/>
         
         </p>
          
         <p> 
         <label for="password" class="youpasswd" > Your password </label>
         <input id="password" name="password" required type="password" placeholder="eg. X8df!90EO" class="password_pic" /> 
         </p>
         
         <p class="keeplogin"> 
	  <!--<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> -->
	  <label for="loginkeeping"><a href="{{ URL::to("forgot")}}">Forgot Password</a></label>
	   </p>
          
         <p class="login button"> 
         <input type="submit" value="Login" /> 
	  </p>
           
         <p class="change_link">
	  Not a member yet ?
	  <a href="{{ URL::to("register") }}" class="to_register">Join us</a>
	  </p>
                            
    </form>
                        
                        
                        
         </div>
</div></article>
@stop