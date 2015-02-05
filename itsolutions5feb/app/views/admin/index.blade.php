<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | Admin</title>
<link href="{{URL::asset('assets/admin/css/960.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{URL::asset('assets/admin/css/reset.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{URL::asset('assets/admin/css/text.css') }}" rel="stylesheet" type="text/css" media="all" />
<link href="{{URL::asset('assets/admin/css/login.css') }}" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
  <?php 
  if(isset($forgot_form) && $forgot_form=='forgot')
  {
  ?>
   	  <h1> Admin - Forgot Password</h1>
    	<div id="login">
    	  <p class="tip">You just need to hit the button and you will get a mail for new password!</p>
          <p class="error">@if(isset($fail))
          <?php  echo $fail ;?></p>
          @endif 
          
          @if(isset($sucess))
          <p id="success" class="info"><span class="info_inner">{{ $sucess }}</span></p>
          @endif  
                 
    	  {{ Form::open(array('action' => array('AdminController@forgot_pwd'))) }}

    	    
         
    	    <p>
    	      
            
            {{ Form::label('email', 'Email') . Form::text('email',Input::old('email'),array('class'=>'inputText')) }}
            <p class="error">
              {{ $errors->first('email') }}
              </p>
              
              <?php if(isset($notvalid))
			{?>
            <p class="error">
              {{ $notvalid }}
              </p>
              
              <?php
			}
			?>
    	    </p>
            <div class="btn">
            <span></span>
            {{ Form::submit('Forgot!',array('class'=>'black_button')) }}
             </div>
            {{ Form::token() . Form::close() }}

    		      
    	 
		  <br clear="all" />
    	</div>
       <div id="forgot">
        <a href="{{ URL::to('admin')}}" class="forgotlink"><span>Back to home?</span></a></div> 
        
        <?php
  }
  else
  {?>
  
  <h1> Admin - Login</h1>
    	<div id="login">
    	  <p class="tip">You just need to hit the button and you're in!</p>
          <p class="error">@if(isset($fail))
          <?php  echo $fail ;?></p>
          @endif        
    	  {{ Form::open(array('action' => array('AdminController@adminhome'))) }}

    	    <p>
    	      
              {{ Form::label('username', 'Username') . Form::text('username', Input::old('username'),array('class'=>'inputText')) }}
              <p class="error">
              {{ $errors->first('username') }}
              </p>
  	      </p>
    	    <p>
    	      
            {{ Form::label('password', 'Password') . Form::password('password',array('class'=>'inputText')) }}
            <p class="error">
              {{ $errors->first('password') }}
              </p>
    	    </p>
            <div class="btn">
            <span></span>
            {{ Form::submit('Login!',array('class'=>'black_button')) }}
             </div>
            {{ Form::token() . Form::close() }}

    		         
    	 
		  <br clear="all" />
    	</div>
        
        <div id="forgot">
        <a href="{{ URL::to('adminforgot_pwd')}}" class="forgotlink"><span>Forgot your username or password?</span></a>
       <!--<a href="#" class="forgotlink"><span>Forgot your username or password?</span></a> -->
        
        </div>
  <?php 
  }?>
  </div>
</div>
<br clear="all" />
</body>
</html>
