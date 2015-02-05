@extends('layouts.layout')
@section('slider')
@stop
@section('main')
       <section class="pdt_dtl_con">
       <aside class="product_dtl">
       <article class="s_prodt_con">
       <figure class="hard_pdt">
       <div class="targetarea">
<?php 
foreach($detail as $detail)
{
$image=explode(',',$detail->product_image);
}
?>
	<img id="multizoom1" alt="zoomable" title="" src="{{URL::to('/public/uploads/'.$image[0])}}"/>
	</div>
	</figure>
	<div class="multizoom1 thumbs">
	<aside class="inn_prd_pic">

<?php
foreach($image as $img)
{
?>
<abbr class="thumb_pdt">
<a href="{{URL::to('/public/uploads/mid/mid_'.$img)}}" data-large="" data-title="test" data-lens="true" data-magsize="420,450">
{{HTML::image('/public/uploads/thumb/thumb_'.$img)}}</a>
</abbr>
<?php
 
}?>

</aside>

</div>


</article>
<abbr class="hard_dtl">

<form action="{{URL::action('ProductController@addtocart')}}" method="post">
<h2><?php echo $detail->name ;?></h2>
<input type="hidden" name="id" value="<?php echo $detail->product_id ;?>" />
<input type="hidden" name="name" value="<?php echo $detail->name ;?>" />
<p><?php echo $detail->discription ;?></p>
<input type="hidden" name="description" value="<?php echo $detail->discription ;?>" />
<h3> $<?php echo $detail->price ;?></h3>
<input type="hidden" name="price" value="<?php echo $detail->price ;?>" />
<h4>Quantity :</h4>
<input type="text" class="in_quant" name="quantity" id="qty"><br /><br />
{{ $errors->first('quantity', '<span class="errormessage">:message</span>') }}
<input type="hidden" class="in_quant" name="image" value="<?php echo $detail->product_image;?>">
<div class="clear"></div>
<h5>
<input type="submit" name="cart" value="Add to Cart" />
</h5>
</form>


	<?php
	if(isset($color_products) && (!empty($color_products)))
	{?>
              <article class="chse">
              <h3>Color Available :</h3>
              <aside class="chose_color">
              <abbr class="color_con">
	<?php

 
foreach($color_products as $data)
{
	$code=$data->color_name;
	$image=explode(',',$data->images);


?>
<abbr class="thumb_pdt">
<?php foreach($image as $img){?>
<a href="{{URL::to('/public/uploads/'.$img)}}" data-title="test" data-lens="true" data-magsize="420,450" class="colorpic"></a>
<?php }?>
<abbr class="sel_color" style="background-color:#<?php echo $code;?>" ></abbr>
</abbr>
<?php }?>
<!--<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>
<abbr class="sel_color"></abbr>-->

</abbr>
</aside>


</article>
<?php }
?>



<!--<article class="chse">
<h3>Choose Size :</h3>

<aside class="choose_size">
<abbr class="size_con">
<abbr class="sel_size">26</abbr>
<abbr class="sel_size">26</abbr>
<abbr class="sel_size">26</abbr>
<abbr class="sel_size">26</abbr>
<abbr class="sel_size">26</abbr>
<abbr class="sel_size">26</abbr>
<abbr class="sel_size">26</abbr>
<abbr class="sel_size">26</abbr>
<abbr class="sel_size">26</abbr>
</abbr>
</aside>
</article>-->


</abbr>




</aside>








</section>
@stop