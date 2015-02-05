<aside class="left_cntnt">
<h1>Categories</h1>
<nav class="cnt_menu">
<ul>
<?php



if(!empty($category))

{?>
	@foreach($category as $name)
       
	<li><a href="{{ URL::action('ProductController@catproducts',array('id'=>$name->cate_id))}}">
                     {{ $name->cate_name or 'default' }}</a>
        @endforeach
<?php }?>


<!--<li><a href="{{ URL::to("allproducts") }}">Morbi nisl sem</a></li>
<li><a href="{{ URL::to("allproducts") }}">Quisque accumsan</a></li>
<li><a href="{{ URL::to("allproducts") }}">In id ipsum</a></li>
<li><a href="{{ URL::to("allproducts") }}">Proin auisque</a></li>
<li><a href="{{ URL::to("allproducts") }}">CD/DVD drives </a></li>
<li><a href="{{ URL::to("allproducts") }}">Motherboards </a></li>
<li><a href="{{ URL::to("allproducts") }}">Hard drives </a></li>
<li><a href="{{ URL::to("allproducts") }}">Monitors </a></li>
<li><a href="{{ URL::to("allproducts") }}">Video adapters</a></li>
<li><a href="{{ URL::to("allproducts") }}">Keyboards/Mouse</a></li>
<li><a href="{{ URL::to("allproducts") }}">CD/DVD drives </a></li>
<li><a href="{{ URL::to("allproducts") }}">Motherboards </a></li>
<li><a href="{{ URL::to("allproducts") }}">Hard drives </a></li>
<li><a href="{{ URL::to("allproducts") }}">Monitors </a></li>
<li><a href="{{ URL::to("allproducts") }}">Video adapters </a></li>
<li><a href="{{ URL::to("allproducts") }}">Keyboards/Mouse </a></li>
--></ul>


</nav>

<div class="clear"></div>

<figure class="shop_now">
<a href="#">{{HTML::image('/assets/images/shop.png')}}</a>
</figure>

</aside>