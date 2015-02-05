<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>- IT SOLUTIONS -</title>
<link rel="stylesheet" href="{{URL::asset('assets/css/style.css') }}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('assets/css/js-image-slider.css') }}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('assets/css/demo.css') }}" type="text/css" media="screen" />
<link rel="stylesheet" href="{{URL::asset('assets/css/flexslider.css') }}" type="text/css" media="screen" />
<script src="{{URL::asset('assets/js/html5shiv.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('assets/js/html5shiv-printshiv.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

<script type="text/javascript" src="{{URL::asset('assets/js/multizoom.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/js-image-slider.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/cart.js')}}"></script>

	<!-- Modernizr -->
<script src="{{URL::asset('assets/js/modernizr.js')}}"></script>
<script type="text/javascript">

jQuery(document).ready(function($){

	  
	$('.sel_color').click(function()
         {
		  var href = $('.colorpic').attr('href');
		 	alert(href);
		  
		  //$('#multizoom1').attr('src', href);
	    
		
	  });

	
	
	$('#image1').addimagezoom({ // single image zoom
		zoomrange: [3, 10],
		magnifiersize: [300,300],
		magnifierpos: 'right',
		cursorshade: true,
		largeimage: 'hayden.jpg' //<-- No comma after last option!
	})


	$('#image2').addimagezoom() // single image zoom with default options
	
	$('#multizoom1').addimagezoom({ // multi-zoom: options same as for previous Featured Image Zoomer's addimagezoom unless noted as '- new'
		descArea: '#description', // description selector (optional - but required if descriptions are used) - new
		speed: 1500, // duration of fade in for new zoomable images (in milliseconds, optional) - new
		descpos: true, // if set to true - description position follows image position at a set distance, defaults to false (optional) - new
		imagevertcenter: true, // zoomable image centers vertically in its container (optional) - new
		magvertcenter: true, // magnified area centers vertically in relation to the zoomable image (optional) - new
		
		zoomrange: [3, 10],
		magnifiersize: [490,490],
		magnifierpos: 'right',
		cursorshadecolor: '#fdffd5',
		cursorshade: true //<-- No comma after last option!
	});
	
		
		$('#multizoom2').addimagezoom({ // multi-zoom: options same as for previous Featured Image Zoomer's addimagezoom unless noted as '- new'
		descArea: '#description2', // description selector (optional - but required if descriptions are used) - new
		disablewheel: true // even without variable zoom, mousewheel will not shift image position while mouse is over image (optional) - new
				//^-- No comma after last option!	
	});
	
})

</script>


</head>

<body>
<div id="wrapper">

<section class="hdr">

<header class="inn_hdr">
<abbr class="logo">
<a href="{{ URL::to("/") }}">
<h1 style="font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif" >IT SOLUTIONS</h1>
</a>
</abbr>

<nav class="menu">
<a href="#" class="top_menu">Menu</a>

<ul>

<?php if(Route::currentRouteAction()==''){?>
<li><a href="{{ URL::to("/") }}" class="activemenu">Home Page</a></li>
<?php } else {?>
<li><a href="{{ URL::to("/") }}">Home Page</a></li>
<?php }if(Route::currentRouteAction()=='ProductController@allnewproducts'){?>
<li><a href="{{ URL::to("allnewproducts") }}" class="activemenu">New products</a></li>
<?php } else {?>
<li><a href="{{ URL::to("allnewproducts") }}">New products</a></li>
<?php }if(Route::currentRouteAction()=='ProductController@allspecialproducts'){ ?>
<li><a href="{{ URL::to("allspecialproducts") }}" class="activemenu">Specials</a></li>
<?php } else {?>
<li><a href="{{ URL::to("allspecialproducts") }}">Specials</a></li>
<?php }?>
<li>
<?php $session = Session::get('key');
if(isset($session))
	{
	?>
		<a href="{{ URL::to("created") }}">My  account</a>
		<?php } else {?>
		<a href="{{ URL::to("login") }}">My  account</a></li>
		<?php  }?>
      	 <?php if(Route::currentRouteAction()=='HomeController@contact'){?>
		<li><a href="{{ URL::to("contact") }}" class="activemenu">Contact Us</a></li>
              <?php } else {?>
              <li><a href="{{ URL::to("contact") }}">Contact Us</a></li>
              <?php }?>
		</ul>

</nav>

</header>

</section>

<!--------section div ends in index page
<!----------login----------->

