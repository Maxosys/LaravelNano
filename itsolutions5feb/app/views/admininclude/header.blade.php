
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Modern Admin</title>
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/admin/css/960.css') }}" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/admin/css/reset.css') }}" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/admin/css/text.css') }}" />
<link rel="stylesheet" type="text/css" href="{{URL::asset('assets/admin/css/blue.css') }}" />
<link type="text/css" href="{{URL::asset('assets/admin/css/smoothness/ui.css') }}" rel="stylesheet" />  
    <script type="text/javascript" src="{{URL::asset('assets/admin/js/jquery.min.js') }}"></script>
    
     <link type="text/css" href="{{URL::asset('assets/admin/js/wysiwyg/jquery.wysiwyg.css') }}" rel="stylesheet" />
    <script type="text/javascript" src="{{URL::asset('assets/admin/js/blend/jquery.blend.js') }}"></script>
	<script type="text/javascript" src="{{URL::asset('assets/admin/js/ui.core.js') }}"></script>
	<script type="text/javascript" src="{{URL::asset('assets/admin/js/ui.sortable.js') }}"></script>    
    <script type="text/javascript" src="{{URL::asset('assets/admin/js/ui.dialog.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/admin/js/ui.datepicker.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/admin/js/effects.js') }}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/admin/js/flot/jquery.flot.pack.js') }}"></script>
    
  
    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="js/flot/excanvas.pack.js"></script>
    <![endif]-->
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
	<script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>        
    <![endif]-->
    <script id="source" language="javascript" type="text/javascript" src="{{URL::asset('assets/admin/js/graphs.js') }}"></script>



</head>

<body>

<!-- WRAPPER START -->
<div class="container_16" id="wrapper">	
<!-- HIDDEN COLOR CHANGER -->      
      <div style="position:relative;">
      	<div id="colorchanger">
        	<a href="dashboard_red.html"><span class="redtheme">Red Theme</span></a>
            <a href="dashboard.html"><span class="bluetheme">Blue Theme</span></a>
            <a href="dashboard_green.html"><span class="greentheme">Green Theme</span></a>
        </div>
      </div>
  	<!--LOGO-->
	<div class="grid_8" id="logo"> Admin - Website Administration</div>
    <div class="grid_8">
<!-- USER TOOLS START -->
<?php 
$session = Session::get('adminsession');
?>
      <div id="user_tools"><span><?php if(isset($session) && !empty($session)){?> Welcome <a href="#"><?php echo $session['username']?></a><?php }?> | <a href="{{action('AdminController@changepwd')}}">Change password</a> |<?php
	  
	   if(isset($session) && !empty($session)){?> <a href="{{action('AdminController@logout')}}">Logout</a><?php }else {?><a href="#">Login</a><?php }?></span></div>
    </div>
<!-- USER TOOLS END -->    
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
    
    <?php 
	//echo Request::url();
	//echo url().'admin_product';
	if(Request::url() === url().'/dashboard')
	{?>
    <li class="item first" id="one"><a href="{{ action('AdminController@dashboard')}}" class="main current" ><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
   <?php 
	}
	else
	{
		?>
        <li class="item first" id="one"><a href="{{ action('AdminController@dashboard')}}" class="main" ><span class="outer"><span class="inner dashboard">Dashboard</span></span></a></li>
        <?php
	}
		?>
        
        
        <?php 
		if(Request::url() === url().'/admin_product')
	     {?>
        <li class="item middle" id="two"><a href="{{ action('AdminController@showproducts')}}" class="main current"><span class="outer"><span class="inner content">Products</span></span></a></li>
        <?php 
		 }
		 else
		 {?>
         <li class="item middle" id="two"><a href="{{ action('AdminController@showproducts')}}" class="main"><span class="outer"><span class="inner content">Products</span></span></a></li>
         <?php 
		 }?>
        
        <li class="item middle" id="three"><a href="#"><span class="outer"><span class="inner reports png">Reports</span></span></a></li>
        
        <?php 
		if(Request::url() === url().'/adminusers')
	     {?>
        <li class="item middle" id="four"><a href="{{ action('AdminController@users')}}" class="main current"><span class="outer"><span class="inner users">Users</span></span></a></li>
        <?php 
		 }
		 else
		 {?>
         <li class="item middle" id="four"><a href="{{ action('AdminController@users')}}" class="main"><span class="outer"><span class="inner users">Users</span></span></a></li>
         <?php 
		 }?>
		<li class="item middle" id="five"><a href="#" class="main"><span class="outer"><span class="inner media_library">Media Library</span></span></a></li> 
        
               
		<li class="item middle" id="six"><a href="#" class="main"><span class="outer"><span class="inner event_manager">Event Manager</span></span></a></li>        
		<li class="item middle" id="seven"><a href="#" class="main"><span class="outer"><span class="inner newsletter">Newsletter</span></span></a></li>        
		<li class="item last" id="eight"><a href="#" class="main"><span class="outer"><span class="inner settings">Settings</span></span></a></li>        
    </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
            <?php 
            if(Request::url() === url().'/dashboard')
	{?>
                      <li><a href="{{ action('AdminController@dashboard')}}" class="current"><span>Order Details</span></a></li>
                      <?php 
	}
	else
	{?>
     <li><a href="{{ action('AdminController@dashboard')}}"><span>Order Details</span></a></li>
    <?php 
	}?>
    
    <?php
	//echo url().'/admincate_edit/*';
	if(Request::url() === url().'/admin_category' || Request::url()===url().'/admincate_edit')
	{?>
                      <li><a href="{{ action('AdminController@addcategory')}}" class="current"><span>Category</span></a></li>
                      <?php 
	}
	else
	{?>
     <li><a href="{{ action('AdminController@addcategory')}}"><span>Category</span></a></li>
    <?php
	}
    ?>
                      
                      <?php 
		if(Request::url() === url().'/admin_product')
	     {?>
                      <li><a href="{{ action('AdminController@showproducts')}}" class="current"><span>Products</span></a></li>
                      <?php 
		 }
		 else
		 {?>
          <li><a href="{{ action('AdminController@showproducts')}}"><span>Products</span></a></li>
         <?php 
		 }?>
         
         <?php 
		if(Request::url() === url().'/adminusers')
	     {?>
                      <li><a href="{{ action('AdminController@users')}}" class="current"><span>Users</span></a></li>
                      <?php 
		 }
		 else
		 {?>
                      <li><a href="{{ action('AdminController@users')}}" ><span>Users</span></a></li>
         <?php 
		 }?>
                      <li><a href="{{ action('AdminController@havecolor')}}"><span>Color Available</span></a></li>
                      <li><a href="#"><span>Submenu Link 6</span></a></li>
                      <li><a href="#" class="more"><span>More Submenus</span></a></li>            
           </ul>
        </div>
    </div>
<!-- TABS END -->    
</div>
<!-- HIDDEN SUBMENU START -->
<div class="grid_16" id="hidden_submenu">
	  <ul class="more_menu">
		<li><a href="#">More link 1</a></li>
		<li><a href="#">More link 2</a></li>  
	    <li><a href="#">More link 3</a></li>    
        <li><a href="#">More link 4</a></li>                               
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 5</a></li>
		<li><a href="#">More link 6</a></li>  
	    <li><a href="#">More link 7</a></li> 
        <li><a href="#">More link 8</a></li>                                  
      </ul>
	  <ul class="more_menu">
		<li><a href="#">More link 9</a></li>
		<li><a href="#">More link 10</a></li>  
	    <li><a href="#">More link 11</a></li>  
        <li><a href="#">More link 12</a></li>                                 
      </ul>            
  </div>
<!-- HIDDEN SUBMENU END -->