@section('header')
@include('common.header')
@show
<section class="content">
@section('logincart')
@include('common.logincart')
@show
<!----------------------header-------------------->
<!----------------Slider----------------->
@section('slider')
@include('common.slider')
@show
<!------------Slider--------------->

@section('main')
<article class="inn_content">

<!---left sidebar--->
@section('sidebar')
@include('common.sidebar')
@show
<!------left Sidebar------>
@section('rightcontent')
<!----Right content--->
@yield('content')
@show
<!-------------------right content--------------->
</article>
@show
 
 
</section><!------ section div starts in header------------->
 
@section('footer')
@include('common.footer')
@show

</div>

</body>
</html>
