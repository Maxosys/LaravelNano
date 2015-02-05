@extends('layouts.layout')
@section('slider')
@stop



@section('main')
<article class="inn_content">

<aside class="left_cntnt">
<h1>Categories</h1>
<nav class="cnt_menu">
<ul>
<?php
if(isset($catname) && (!empty($catname)))
{
foreach($catname as $name)
	{		
		$catid=$name->cate_id; 
	}
}
else
{
	$catid='';	
}

foreach($category as $cate)
	{
	  if($catid==$cate->cate_id){?>
      	 <li><a href="{{ URL::action('ProductController@catproducts',array('id'=> $cate->cate_id))}}"
      	 class="red">
	<?php echo $cate->cate_name; ?></a></li>
       
       <?php } else {?>
		<li><a href="{{ URL::action('ProductController@catproducts',array('id'=> $cate->cate_id))}}"
      	 >
	<?php echo $cate->cate_name; ?></a></li>
		<?php }}?>
</ul>

<!--{{ URL::action('ProductController@product',array('id'=>$cate->cate_id))}}-->
</nav>

<div class="clear"></div>

<figure class="shop_now">
<a href="#">{{HTML::image('/assets/images/shop.png')}}</a>
</figure>

</aside>

<?php 
if(isset($new) && (!empty($new)))
{
	$catname='New Products';	
}
elseif(isset($special) && (!empty($special)))
{
	$catname='Special Products';
}

else
{
	foreach($catname as $catname)
	{		
		$catname=$catname->cate_name; 
	}
}
?>

<aside class="rt_cntnt">
<article class="model">
<abbr class="pop_model">
<h1>Home -><?php echo $catname;?> 
</h1>
</abbr>

</article>
<?php
if(isset($products) && (!empty($products)))
{
	
?>
<article class="new_mdl">
<?php 
foreach($products as $pro)
		{
		$imgname=explode(',',$pro->product_image);
		$producttype=$pro->product_type;
		 ?>
              <?php if($producttype=='featured'){?>
         	<abbr class="model_dtl_special">
		<?php } else {?>
              <abbr class="model_dtl">
              <?php }?>
		<h2><?php //echo $pro->discription;
		echo $pro->name;
		?></h2>
		<abbr class="clear"></abbr>
		<figure class="new_mdl_pic">
		<a href="{{ URL::action('ProductController@product',array('id'=>$pro->product_id))}}">			
		<?php echo HTML::image('/public/uploads/thumb/thumb_'.$imgname[0]);?></a>
		</figure>

<hgroup class="price_dtl">
<h3><a href="{{ URL::action('ProductController@product',array('id'=>$pro->product_id))}}">More details</a></h3>
<h4><a href="#"><?php $pro->price;?> USD</a></h4>
</hgroup>
</abbr>
</abbr>

		 
<?php 
}?>
 </article>
<?php }
else
{?>
<article class="new_mdl">
<p><?php echo $notfound ;?></p>
<?php }?>
</article>
</aside>

<abbr class="pagi_no_mid">
<nav class="pagi_no">
<?php echo $products->links();?>
</nav>
</abbr>
</article>



@stop
