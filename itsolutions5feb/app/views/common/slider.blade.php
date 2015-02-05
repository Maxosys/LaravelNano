<aside class="slider_frame">
<div id="sliderFrame">
        <div id="slider">
            <a href=""><img src="{{asset('/assets/images/slider-1.jpg')}}" alt="#htmlcaption1" /></a>
            <a class="lazyImage" href="{{asset('/assets/images/slider-2.jpg')}}" title="#htmlcaption2">slide 2</a>
            <a href="#">
                <b data-src="{{asset('/assets/images/slider-3.jpg')}}" data-alt="#htmlcaption3">Image Slider</b>
            </a>
            <a class="lazyImage" href="{{asset('/assets/images/slider-4.jpg')}}" title="#htmlcaption4">slide 4</a>
        </div>
        <!--thumbnails-->
        <div id="thumbs">
            <div class="thumb"><img src="{{asset('/assets/images/thumb-1.gif')}}"/></div>
            <div class="thumb"><img src="{{asset('/assets/images/thumb-2.gif')}}" /></div>
            <div class="thumb"><img src="{{asset('/assets/images/thumb-3.gif')}}" /></div>
            <div class="thumb"><img src="{{asset('/assets/images/thumb-4.gif')}}" /></div>
        </div>
        <!--captions-->
        <div style="display: none;">
            <div id="htmlcaption1">
                <div class="cap"></div>
            </div>
            <div id="htmlcaption2">
                <div class="cap cap2"></div>
            </div>
            <div id="htmlcaption3">
                <div class="cap cap3"></div>
            </div>
            <div id="htmlcaption4">
                <div class="cap cap4"></div>
            </div>
        </div>
    </div>
<!--{{HTML::image('/assets/images/banner.png')}}-->


</aside>