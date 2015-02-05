<section class="ftr">
<footer class="inn_ftr">
<nav class="ftr_menu">
<ul>
<li><a href="{{ URL::to("/") }}">Home Page </a></li> 
<li><a href="{{ URL::to('allnewproducts')}}">New Products </a></li> 
<li><a href="{{ URL::to('allnewproducts')}}">Specials</a></li> 
<li><a href="{{ URL::to("login") }}">My account</a></li> 
<li><a href="{{ URL::to("contact") }}">Contact Us</a></li> 
</ul>
</nav>
<div class="clear"></div>

<h2>Copyright © 2014<b> www.nanowebtech.com</b></h2>

</footer>

 <!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>

  <!-- FlexSlider -->
  <script defer src="{{URL::asset('assets/js/jquery.flexslider.js')}}"></script>

  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: true,
        itemWidth: 129,
        itemMargin: 5,
        pausePlay: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="{{URL::asset('assets/js/shCore.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('assets/js/shBrushXml.js')}}"></script>
  <script type="text/javascript" src="{{URL::asset('assets/js/shBrushJScript.js')}}"></script>

  <!-- Optional FlexSlider Additions -->
  <script src="{{URL::asset('assets/js/jquery.easing.js')}}"></script>
  <script src="{{URL::asset('assets/js/jquery.mousewheel.js')}}"></script>
  <script defer src="{{URL::asset('assets/js/demo.js')}}"></script>


</section>
