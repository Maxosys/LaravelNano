@extends('layouts.layout')
@section('slider')
@stop
@section('sidebar')
@stop
@section('main')
		
			
	<article class="inn_content_login">
	<div id="wrapper_1">
    
    <?php if(isset($fail))
	 {?>
         <p class="message">  {{ $fail }}</p>
        <?php }
		elseif(isset($sucess))
		{
		?>
        <p class="message" style="color:#060;">{{ $sucess }}</p>
        <?php 
		}?>
       <div id="login" class="animate form">
       
        {{ Form::open(array('HomeController@reset_pwd'))}}
            <h1> Reset password </h1> 
                
            <p> 
              
              {{ Form::label('tokan','Tokan Number',array('class'=>'uname'))}}
              
              {{ Form::text('tokan', Input::old('tokan'),array('class'=>'sign_tbox')) }}
              
              {{ $errors->first('tokan', '<span class="errormessage">:message</span>') }}
            </p>
                  
             <p> 
               {{ Form::label('new_password','New Password',array('class'=>'uname'))}}
              
              {{ Form::password('new_password', Input::old('new_password'),array('class'=>'password_pic')) }}
              
              {{ $errors->first('new_password', '<span class="errormessage">:message</span>') }}
             </p>
             
              <p> 
              
             {{ Form::label('confirm_new_password','Confirm Password',array('class'=>'uname'))}}
              
              {{ Form::password('confirm_new_password', Input::old('confirm_new_password'),array('class'=>'password_pic')) }}
              
              {{ $errors->first('confirm_new_password', '<span class="errormessage">:message</span>') }}
              
             </p>
               
                 <p class="signin button"> 
		   {{ Form::submit('Reset!', array('class'=>'button'))}}
                      {{ Form::token() . Form::close() }}
		  </p>
               
               
         
                       
     </div>

     </div>
     </article>
@stop