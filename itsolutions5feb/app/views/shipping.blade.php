@extends('layouts.layout')
@section('slider')
@stop
@section('sidebar')
@stop
@section('main')

<?php 
if(isset($data) && (!empty($data)))
	{
		$sess_id=$session_id;
		
		foreach($data as $val)
		{
			
			$name=$val->name;
			$email=$val->email;
		}
	}
	else
	{
		$name='';
		$email='';
	}
	
	
if(isset($tempdata) && (!empty($tempdata)))
{
	
	
	foreach($tempdata as $val)
	{
		$address=$val->address;
		$country=$val->country;
		$state=$val->state;
		$city=$val->city;
		$s_address=$val->s_address;
		$s_country=$val->s_country;
		$s_state=$val->s_state;
		$s_city=$val->s_city;
	}
}
else
{
	       $address='';
		$country='';
		$state='';
		$city='';
		$s_address='';
		$s_country='';
		$s_state='';
		$s_city='';
}
?>
<div class="clear"></div>
<article class="containner">
<article class="mid_wrap">

<aside class="reg_form">
<h2>Your Shipping Address</h2>
<form name="shippingform" action="{{URL::action('HomeController@updatecart',array('session_id'=>$sess_id))}}" method="post">

<article class="regis">
<h1>USER ADDRESS</h1>
<aside class="reg_fld">
<abbr class="reg_name_fld1">
<h1><span>*</span> First Name :</h1>
<input type="text" class="reg_in" value="{{$name}}"  name="name"/>
<input type="hidden" name="session_id" value=""> 
<br />
{{ $errors->first('name', '<span class="errormessage">:message</span>') }}
</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1><span>*</span> Email :</h1>
<input type="text" class="reg_in" value="{{$email}}"  name="email"/>
<br />
{{ $errors->first('email', '<span class="errormessage">:message</span>') }}
</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1><span>*</span> Address :</h1>
<input type="text" class="reg_in"  name="address" value="{{$address}}"/>
<br />
{{ $errors->first('address', '<span class="errormessage">:message</span>') }}
</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1>Country :</h1>
<input type="text" class="reg_in"  name="country" value="{{$country}}"/>
<br />
{{ $errors->first('country', '<span class="errormessage">:message</span>') }}
</abbr>

</aside>


<aside class="reg_fld">
<abbr class="reg_en_fld">
<h1>State :</h1>
<input type="text" class="reg_in" name="state" value="{{$state}}" />
<br />
{{ $errors->first('state', '<span class="errormessage">:message</span>') }}
</abbr>

</aside>

<aside class="reg_fld">
<abbr class="reg_en_fld">
<h1>City :</h1>
<input type="text" class="reg_in"  name="city"  value="{{$city}}"/>
<br />
{{$errors->first('city', '<span class="errormessage">:message</span>') }}
</abbr>
</aside>


</article>



<!----------------------------------->
<article class="regis_right">
<h1>SHIPPING ADDRESS</h1>

<aside class="reg_fld">
<abbr class="reg_name_fld1">
<h1><span>*</span> First Name :</h1>
<input type="text" class="reg_in" value="{{$name}}"  name="s_name"/>
<br />
{{$errors->first('name', '<span class="errormessage">:message</span>') }}
</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1><span>*</span> Email :</h1>
<input type="text" class="reg_in"  value="{{$email}}" name="s_email"/>
<br />
{{$errors->first('email', '<span class="errormessage">:message</span>') }}
</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1><span>*</span>Address :</h1>
<input type="text" class="reg_in"  name="s_address"  value="{{$s_address}}"/>
<br />
{{$errors->first('address', '<span class="errormessage">:message</span>') }}
</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1>Country :</h1>
<input type="text" class="reg_in"  name="s_country" value="{{$s_country}}"/>
<br />
{{$errors->first('country', '<span class="errormessage">:message</span>') }}
</abbr>

</aside>


<aside class="reg_fld">
<abbr class="reg_en_fld">
<h1>State :</h1>
<input type="text" class="reg_in" name="s_state" value="{{$s_state}}" />
<br />
{{$errors->first('state', '<span class="errormessage">:message</span>') }}
</abbr>
</aside>

<aside class="reg_fld">
<abbr class="reg_en_fld">
<h1>City :</h1>
<input type="text" class="reg_in" name="s_city"  value="{{$s_city}}"/>
<br />
{{$errors->first('city', '<span class="errormessage">:message</span>') }}
</abbr>
</aside>

</article>
<!--<div class="clear"></div>
<script 
    data-env="sandbox" 
    data-callback="www.nanowebtech.com" 
    data-tax="3.50" 
    data-shipping="0.75" 
    data-currency="USD" 
    data-amount="5.00" 
    data-quantity="1" 
    data-name="demo" 
    data-button="buynow" src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=amarjit.attri@nanowebtech.com"
></script>-->
<input type="button" name="shipping_del" value="BACK" class="procd_btn" style="flaot:left!important;" />
<input type="submit" name="shipping" value="Continue and Confirm Order" class="procd_btn">
</form>


<!--<form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' name='frmPayPal1'>
        <input type='hidden' name='business' value='amarjit.attri@nanowebtech.com'>
        <input type='hidden' name='cmd' value='_xclick'>
        <input type='hidden' name='item_name' value='Get Full Access'>
        <input type='hidden' name='amount' value="5">
        <input type='hidden' name='no_shipping' value='1'>
        <input type='hidden' name='currency_code' value='USD'>
        <input type='hidden' name='handling' value='0'>
        <input type='hidden' name='cancel_return' value='<?php //echo site_url('front/dashboard');?>'>
        <input type='hidden' name='return' value='<?php //echo site_url('front/dashboard');?>'>
        <input type="hidden" name="notify_url" value="<?php  //echo site_url('front/dashboard');?>">

<button class="paypal_button" id="submit-payment" type="submit" value="Submit Payment1">Proceed Payment with PayPal!</button>  
        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
        
</form>
-->

</aside>
</article>
</article>
@stop