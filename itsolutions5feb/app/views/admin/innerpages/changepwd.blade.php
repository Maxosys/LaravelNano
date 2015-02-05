@extends('layouts.admin')
@section('content')
<div class="portlet-content">
		  <p></p>
		  <h3>Change Password or Username</h3>
          
          <?php if(isset($msg))
		  {?>
          <p class="info" id="success"><span class="info_inner"><?php echo $msg;?></span></p>
          <?php }?>
		  {{ Form::open(array('action'=>'AdminController@changepwd'))}}
		   <!-- <label>Some title</label>
		     <input type="text" name="textfield" id="textfield" class="smallInput" />-->
             
             {{ Form::label('username', 'Username') . Form::text('username', Input::old('username'),array('class'=>'smallInput')) }}
             
           
            
           <p class="error">
              {{ $errors->first('username') }}
           </p>
			<!--<label>Large input box</label>
            <input type="text" name="textfield2" id="textfield2" class="largeInput" />
            <label>This is a textarea</label>
		    <textarea name="textarea" cols="45" rows="3" class="smallInput" id="textarea"></textarea>-->
            {{ Form::label('password','Password'). Form::password('password',array('class'=>'smallInput'))}}
             <p class="error">
              {{ $errors->first('password') }}
              </p>
           <div class="clear"> </div>
          <div class="btn">
            <span></span>
           {{ Form::submit('Update!', array('class'=>'button'))}}
          </div>
            {{ Form::token() . Form::close() }}

            <!--<a class="button"><span>Submit in blue</span></a>
            <a class="button_grey"><span>Submit this form</span></a>-->
		
		  <p>&nbsp;</p>
		</div>
        
        @stop