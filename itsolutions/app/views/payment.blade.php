@extends('layouts.layout')
@section('slider')
@stop
@section('sidebar')
@stop
@section('main')
<?php 

if(isset($tempdata) && (!empty($tempdata)))
{
	foreach($tempdata as $data)
	{
		$quantity=$data->quantity;
		$single_price=$data->single_price;
		$quantity_price=$data->quantity_price;
		$pro_image=$data->pro_image;
		$pro_name=$data->pro_name;
		$pro_des=$data->pro_desc;
		$name = $data->name;
              $email=$data->email;
              $address= $data->address;
           	$country = $data->country;
              $state=$data->state;
           	$city= $data->city;
           	$sname= $data->s_name;
           	$semail= $data->s_email;
           	$saddress= $data->s_address;
           	$scountry= $data->s_country;
            	$sstate= $data->s_state;
              $scity=$data->s_city;
		
	}
}
else
{
		$quantity=0;
		$single_price=0;
		$quantity_price=0;	
		$pro_image='';
		$pro_name='';
		$pro_des='';
		$name ='';
		$email='';
		$address='';
		$country='';
		$state='';
		$city='';
		$sname='';
		$semail='';
		$saddress='';
		$scountry='';
		$sstate='';
		$scity='';
}
?>


<div class="clear"></div>
<article class="containner">
<article class="mid_wrap">

<aside class="reg_form">
<h2>CONFIRM ORDER</h2>
<form name="shippingform" action="" method="post">

<article class="regis">
<h1>USER ADDRESS</h1>
<aside class="reg_fld">
<abbr class="reg_name_fld1">
<h1><span>*</span> First Name :</h1>
<input type="text" class="reg_in" value="{{$name}}" name="name"/>
<input type="hidden" name="session_id" value=""> 
</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1><span>*</span> Email :</h1>
<input type="text" class="reg_in" value="{{$email}}"  name="email"/>

</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1><span>*</span> Address :</h1>
<input type="text" class="reg_in"  name="address" value="{{$address}}"/>
</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1>Country :</h1>
<input type="text" class="reg_in"  name="country" value="{{$country}}"/>

</abbr>

</aside>


<aside class="reg_fld">
<abbr class="reg_en_fld">
<h1>State :</h1>
<input type="text" class="reg_in" name="state"  value="{{$state}}"/>

</abbr>

</aside>

<aside class="reg_fld">
<abbr class="reg_en_fld">
<h1>City :</h1>
<input type="text" class="reg_in"  name="city" value="{{$city}}"/>

</abbr>
</aside>


</article>



<!----------------------------------->
<article class="regis_right">
<h1>SHIPPING ADDRESS</h1>

<aside class="reg_fld">
<abbr class="reg_name_fld1">
<h1><span>*</span> First Name :</h1>
<input type="text" class="reg_in" value="{{$sname}}"  name="s_name"/>

</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1><span>*</span> Email :</h1>
<input type="text" class="reg_in"  value="{{$semail}}" name="s_email"/>
</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1><span>*</span>Address :</h1>
<input type="text" class="reg_in"  name="s_address" value="{{$saddress}}"/>

</abbr>

</aside>

<aside class="reg_fld">

<abbr class="reg_en_fld">
<h1>Country :</h1>
<input type="text" class="reg_in"  name="s_country" value="{{$scountry}}"/>

</abbr>

</aside>


<aside class="reg_fld">
<abbr class="reg_en_fld">
<h1>State :</h1>
<input type="text" class="reg_in" name="s_state" value="{{$sstate}}" />

</abbr>
</aside>

<aside class="reg_fld">
<abbr class="reg_en_fld">
<h1>City :</h1>
<input type="text" class="reg_in" name="s_city"  value="{{$scity}}"/>

</abbr>
</aside>
</article>

<!-------------------------------------right---------------------------->

<!------------------------------cart------------------------------------->
<aside class="cart_table">

<abbr class="cart_t_head">
<abbr class="cart_item">
<h1>Cart Items</h1>
</abbr>
<abbr class="cart_qty">
<h1>Qty</h1>
</abbr>
<abbr class="cart_qty1">
<h1>Item Price</h1>
</abbr>
<abbr class="cart_qty">
<h1>Item Total</h1>
</abbr>

</abbr>

<?php

if(isset($tempdata) && (!empty($tempdata)))
{
	$sum=0;
	
	foreach($tempdata as $order)
	{
		$tempid=$order->temp_id;
		
		$session_id=$order->session_id;
		$image=$order->pro_image;
		$name= $order->pro_name;
		$description=$order->pro_desc;
		$single_price=$order->single_price;
		$quantity_price=$order->quantity_price;
		$quantity=$order->quantity;
		$message='';
		$sum=$sum+$quantity_price;
		
		
	
 

?>

<abbr class="cart_sub_head" id="cart_sub_head">
<abbr class="cart_item_dtl">
<figure class="item_pic">
{{HTML::image('/public/uploads/'.$image)}}
</figure>
<h1>{{$description}}</h1>
</abbr>
<abbr class="cart_item_price">
<h1>{{$quantity}}</h1>
<div class="clear"></div>

</abbr>

<abbr class="cart_item_price1">

<h1>$ {{$single_price}}</h1>
</abbr>
<abbr class="cart_item_price">
<h1>
<span id="total" class="total">
$ {{$quantity_price}}
</span></h1>
</abbr>
<abbr style="float:left; width:45px;padding:30px 0 0 0" class="cart_item_del">
<input type="hidden" value=""  id=""/>
<a href="#" class="delaction" id="">
{{HTML::image('/assets/images/action_delete.gif')}}
</a>
</abbr>
</abbr>
</abbr>
<?php ;}} else {
	$sum=0;
	?>

 <abbr class="cart_sub_head_empty">
 <h1>Your Cart is empty</h1>
 </abbr>	
<?php }?>


<abbr class="cart_sub_head">
<abbr class="sub_total">
<h1><b>Subtotal :</b><span>$</span><span id="sum">{{$sum}}</span></h1>
</abbr>

</abbr>
<abbr class="cart_sub_head">
<abbr class="sub_total">
<h1>Estimate Shipping and Tax</h1>
</abbr>
	</abbr>
       <abbr class="cart_sub_head">
       <abbr class="sub_total">
       <h1><b>Grand Total :</b><span>$</span><span id="gsum" class="grandsum">{{$sum}}</span></h1>
       </abbr>
       </abbr>
	</aside>

<!-----------------------------Cart-------------------------------------->
</form>
	
        <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' name='frmPayPal1'>
        <input type='hidden' name='business' value='demotesting1@gmail.com'>
        <input type='hidden' name='cmd' value='_xclick'>
        <input type='hidden' name='item_name' value='Total Amount'>
        <input type='hidden' name='amount' value="<?php echo $sum;?>">
         <input type='hidden' name='quantity' value="<?php echo $quantity;?>">
        <input type='hidden' name='no_shipping' value='1'>
        <input type='hidden' name='currency_code' value='USD'>
        <input type='hidden' name='handling' value='0'>
        <input type='hidden' name='cancel_return' value='{{URL::to("cancel")}}'>
        <input type='hidden' name='return' value='{{URL::to("success")}}'>
        <input type="hidden" name="notify_url" value='{{URL::to("success")}}'>

<button class="paypal_button" id="submit-payment" type="submit" value="Submit Payment1">
Proceed Payment with PayPal!</button>  
        <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
        
</form>
<!-------------------------------------------->



</aside>
</article>
</article>

@stop