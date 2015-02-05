@extends('layouts.layout')
@section('slider')
@stop
@section('sidebar')
@stop
@section('main')
<div class="clear"></div>
<article class="containner">
<article class="mid_wrap">

<aside class="reg_form">
<h2>Success</h2>
<p class="successmsg">
You have Successfully make the Payment<br>
<br>
Your Transaction id is:
<?php echo $_POST['txn_id'];?></p>
</aside>
</article></article>
@stop