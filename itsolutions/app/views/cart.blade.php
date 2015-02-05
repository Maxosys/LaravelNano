@extends('layouts.layout')
@section('slider')
@stop
@section('sidebar')
@stop
@section('main')


<div class="clear"></div>
<article class="containner">

<article class="mid_wrap">
<h2>Your Shopping Cart</h2>
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
if(isset($temporder) && (!empty($temporder)))
{
	$sum=0;
	foreach($temporder as $order)
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

{{ $message }}
<abbr class="cart_sub_head" id="cart_sub_head<?php echo  $tempid ;?>">
<abbr class="cart_item_dtl">
<figure class="item_pic">
{{HTML::image('/public/uploads/'.$image)}}
</figure>
<h1>{{$description}}</h1>
</abbr>
<abbr class="cart_item_price">
<select class="qt_price" onchange="cart(this.value,<?php echo $single_price; ?>,<?php echo $tempid;?>);" id="qty">
<?php for($i=1;$i<=10;$i++)
{?>
<option value="<?php echo $i;?>"
<?php if($quantity==$i)
{?> selected="selected"
<?php }?>>
<?php echo $i;?></option>
<?php }?>
</select>
<div class="clear"></div>

</abbr>

<abbr class="cart_item_price1">

<h1>$ {{$single_price}}</h1>
</abbr>
<abbr class="cart_item_price">
<h1>
<span id="total<?php echo $tempid; ?>" class="total">
{{$quantity_price}}</span></h1>
</abbr>
<abbr style="float:left; width:45px;padding:30px 0 0 0" class="cart_item_del">
<input type="hidden" value="<?php echo $tempid;?>"  id="del<?php echo $tempid;?>"/>
<a href="#" class="delaction" id="<?php echo $tempid;?>">
{{HTML::image('/assets/images/action_delete.gif')}}
</a>
</abbr>
</abbr>


</abbr>

<?php 

}}
else
{
	$sum=0;
	$session_id='';
 ?>
 <abbr class="cart_sub_head_empty">
 <h1>Your Cart is empty</h1>
 </abbr>	
<?php }?>



<abbr class="cart_sub_head">
<abbr class="sub_total">
<h1><b>Subtotal :</b><span>$</span><span id="sum">{{ $sum }}</span></h1>
</abbr>

</abbr>
<abbr class="cart_sub_head">
<abbr class="sub_total">
<h1>Estimate Shipping and Tax</h1>
</abbr>
	</abbr>
       <abbr class="cart_sub_head">
       <abbr class="sub_total">
       <h1><b>Grand Total :</b><span>$</span><span id="gsum" class="grandsum">{{ $sum }}</span></h1>
       </abbr>
       </abbr>
	</aside>

<div style="width:200px;">
<a href="#" onclick="history.go(-1); return false;">
<input type="button" class="update_btn" value="Go Back">
</a>
</div>


<a href="{{URL::to("shipping", array('sess_id'=>$session_id)) }}">
<input type="button" class="procd_btn" value="Proceed to Checkout">
</a>
</div>


</article>
</article>

@stop
<div class="clear"></div>