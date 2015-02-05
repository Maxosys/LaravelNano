@extends('layouts.layout')
@section('main')
@parent
<abbr class="pagi_no_mid">
<nav class="pagi_no">
<?php echo $product->links(); ?>
</nav>
</abbr>


@section('rightcontent')
@parent
<aside class="rt_cntnt">

<article class="model">
<abbr class="pop_model">
<h1>Popular Models</h1>
</abbr>

<abbr class="in_pop_mdl">


<div id="main" role="main">
      <section class="slider">
        <div class="flexslider carousel">
          <ul class="slides">
          
<?php
//echo "<pre>";
//print_r($product); 
foreach($allproduct as $val)
{
if(!empty($val->name))
{
	 $image=explode(',',$val->product_image);
	 $producttype=$val->product_type;
	 if(!empty($image))
	 {
		 $image=$image[0];
	 }
	 else
	 {
		 $image = HTML::assets('/images/no_image.gif');
	 }
	if($producttype=='featured')
	{
	?>
                <li>
  	    	    <a href="{{ URL::action('ProductController@product',array('id'=>$val->product_id))}}"><?php echo HTML::image('/public/uploads/'.$image);?></a>
  	    		</li>
                 
                 
<?php }
	  
}
}?>

            
          </ul>
        </div>
      </section>
      
    </div>

 
</abbr>



</article>


<?php if(isset($product) && (!empty($product)))
{
	
?>

<article class="new_mdl">
@foreach($product as $val)
<?php if(!empty($val->name))
{
	 $image=explode(',',$val->product_image);
	 $producttype=$val->product_type;
	 $price=$val->price;
	 if(!empty($image))
	 {
		 $image=$image[0];
	 }
	 else
	 {
		 $image = HTML::assets('/images/no_image.gif');
	 }
	if($producttype=='featured')
	{
	?>
      
<abbr class="model_dtl">
<?php } else {?>
<abbr class="model_dtl_special">
<?php }?>
<h2> {{ $val->name }}</h2>

<abbr class="clear"></abbr>
<figure class="new_mdl_pic">
<a href="{{ URL::action('ProductController@product',array('id'=>$val->product_id))}}"><?php echo HTML::image('/public/uploads/'.$image);?></a>
</figure>

<hgroup class="price_dtl">
<h3><a href="{{ URL::action('ProductController@product',array('id'=>$val->product_id))}}">More details</a></h3>
<h4><a href="#">${{ $price }}</a></h4>
</hgroup>
</abbr></abbr>
<?php }?>
@endforeach
</article>
<?php } 
?>
</aside>

@stop
@stop
