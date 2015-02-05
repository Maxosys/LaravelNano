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
 
  
  <h1> Admin - Reset Password</h1>
    	<div id="login">
    	  <p class="tip">You just need to provide the tokan number sent to you in your E-mail and you can reset your password!</p>
          <p class="error">@if(isset($fail))
          <?php  echo $fail ;?></p>
            @endif  
            
          @if(isset($sucess))
          <p id="success" class="info"><span class="info_inner">{{ $sucess }}</span></p>
          @endif  
                
    	  {{ Form::open(array('action' => array('AdminController@reset_password'))) }}

    	    <p>
    	     
              {{ Form::label('tokan', 'Tokan Number') . Form::text('tokan', Input::old('tokan'),array('class'=>'inputText')) }}
              <p class="error">
              {{ $errors->first('tokan') }}
              </p>
  	      </p>
    	    <p>
    	     
            {{ Form::label('new_password', 'New Password') . Form::password('new_password',array('class'=>'inputText')) }}
            <p class="error">
              {{ $errors->first('new_password') }}
              </p>
    	    </p>
            
            <p>
    	     
            {{ Form::label('confirm_new_password', 'Confirm Password') . Form::password('confirm_new_password',array('class'=>'inputText')) }}
            <p class="error">
              {{ $errors->first('confirm_new_password') }}
              </p>
    	    </p>
            
            <div class="btn">
            <span></span>
            {{ Form::submit('Reset!',array('class'=>'black_button')) }}
             </div>
            {{ Form::token() . Form::close() }}

    		<!--<a class="black_button" href="dashboard.html"><span>Authentification</span></a>-->
             <!--<label>
             <input type="checkbox" name="checkbox" id="checkbox" />
              Remember me</label>   -->         
    	 
		  <br clear="all" />
    	</div>
        
        <div id="forgot">
        <a href="{{ URL::to('admin')}}" class="forgotlink"><span>Back to home?</span></a></div>
 
  </div>
</div>
<br clear="all" />
</body>
</html>
