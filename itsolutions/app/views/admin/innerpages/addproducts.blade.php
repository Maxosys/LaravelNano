@extends('layouts.admin')
@section('content')

   <!-- CONTENT TITLE -->
    <div class="grid_9">
    <h1 class="content_edit">Add New Products</h1>
    </div>
    <!-- CONTENT TITLE RIGHT BOX -->
    <div id="eventbox" class="grid_6"><a class="inline_tip" href="#">From Here you can add the new product</a></div>
    <div class="clear">
    </div>
<!--    TEXT CONTENT OR ANY OTHER CONTENT START     -->
    <div id="textcontent" class="grid_15">
    <?php //echo "<pre>";
	//print_r($pro_data);
	//exit;?>
    
    <?php if(isset($pro_data) && !empty($pro_data))
	{
		
		?>
         {{ Form::open(array('url'=>'edit_product/'.$pro_data[0]->product_id,'files' => true))}}
        <?php 
	}
	else
	{
		?>
         {{ Form::open(array('action'=>'AdminController@insertproduct','files' => true))}}
  <?php 
	}?>
  <?php 

		  foreach($category as $cate)
		  {
			  
			 
			  $cat_name[$cate->cate_id]=$cate->cate_name;
		  }
	
  //echo "<pre>";
	 //print_r($cat_name); 
	  ?>
  <?php 
  if(isset($pro_data) && !empty($pro_data))
	{?>
  <div class="main_view">
       <div class="image_lbl">  
  <?php echo  Form::label('category_name', 'Category Name') ?> 
  </div>
  <?php 
 
   echo Form::select('category_name',array('' => '--Select Category--')+$cat_name, $pro_data[0]->category_id,array('class'=>'smallInput'))?>
  
  <!--{{ Form::select('number', array('0'=>'3','1'=>'4','2'=>'4'), 2) }}-->
    <p class="error">
              {{ $errors->first('category_name') }}
           </p>
  
 </div>
 
  <div class="main_view">
       <div class="image_lbl">  
 <?php echo  Form::label('product_status', 'Product Status') ?> 
 </div>
 <?php  echo Form::select('product_status', array(''=>'--Select Status--','active'=>'enabled','inactive'=>'disabled'),$pro_data[0]->status, array('class'=>'smallInput'))?>
         <p class="error">
              {{ $errors->first('product_status') }}
           </p>
           
      </div> 
      
    <div class="main_view">
       <div class="image_lbl">  
 <?php echo  Form::label('product_type', 'Product Type') ?> 
 </div>
 <?php  echo Form::select('product_type', array(''=>'--Select Type--','featured'=>'Featured','new'=>'New'),$pro_data[0]->product_type, array('class'=>'smallInput'))?>
         <p class="error">
              {{ $errors->first('product_type') }}
           </p>
           
      </div>  
 
 <?php 
	}
	else
	{
	?>
    
    <div class="main_view">
       <div class="image_lbl">  
  <?php echo  Form::label('category_name', 'Category Name') ?> 
  </div>
  <?php  echo Form::select('category_name',array('' => '--Select Category--')+$cat_name, '',array('class'=>'smallInput'))?>
    <p class="error">
              {{ $errors->first('category_name') }}
           </p>
  
 </div>
 
  <div class="main_view">
       <div class="image_lbl">  
 <?php echo  Form::label('product_status', 'Product Status') ?> 
 </div>
 <?php  echo Form::select('product_status', array(''=>'--Select Status--','active'=>'enabled','inactive'=>'disabled'),'', array('class'=>'smallInput'))?>
         <p class="error">
              {{ $errors->first('product_status') }}
           </p>
           
      </div> 
      
    <div class="main_view">
       <div class="image_lbl">  
 <?php echo  Form::label('product_type', 'Product Type') ?> 
 </div>
 <?php  echo Form::select('product_type', array(''=>'--Select Type--','featured'=>'Featured','new'=>'New'), '',array('class'=>'smallInput'))?>
         <p class="error">
              {{ $errors->first('product_type') }}
           </p>
           
      </div>  
    <?php 
	}?>
  
    <div class="clear"></div> 
    <?php 
	if(isset($pro_data) && !empty($pro_data))
	{
		
		$img_name=explode(',',$pro_data[0]->product_image)
		
		?>
        {{ Form::label('product_name', 'Product Name') . Form::text('product_name', $pro_data[0]->name,array('class'=>'smallInput wide')) }}
        <p class="error">
              {{ $errors->first('product_name') }}
           </p>
           
           
            <!--WYSIWYG Editor is linked to the textarea with id: #wysiwyg-->
       {{ Form::label('product_price', 'Product Price') . Form::text('product_price', $pro_data[0]->price,array('class'=>'smallInput wide')) }}
       <p class="error">
              {{ $errors->first('product_price') }}
           </p>
       
        {{ Form::label('product_quantity', 'Product Quantity') . Form::text('product_quantity', $pro_data[0]->quantity,array('class'=>'smallInput wide')) }}
        <p class="error">
              {{ $errors->first('product_quantity') }}
           </p>
        
        {{ Form::label('product_model', 'Product Model') . Form::text('product_model', $pro_data[0]->model,array('class'=>'smallInput wide')) }}
        <p class="error">
              {{ $errors->first('product_model') }}
           </p>
           
           
           <div class="image_div">
            <h1>Product Images</h1>
            
            
        <div class="main_view">
       <div class="image_lbl">     
  {{ Form::label('front_view','Front View')}}
  </div>
  {{Form::file('front_view',array('class'=>'small_input_s'))}}
  
  <p class="error">
              <!--{{ $errors->first('front_view') }}-->
           </p>
  </div>
  
  <div class="main_view">
       <div class="image_lbl">  
   {{ Form::label('left_view','Left View')}}
   </div>
   {{Form::file('left_view',array('class'=>'small_input_s'))}}
   <p class="error">
              <!--{{ $errors->first('left_view') }}-->
           </p>
  </div>
  
  <div class="main_view">
       <div class="image_lbl">  
  
   {{ Form::label('right_view','Right View')}}
   </div>
   {{  Form::file('right_view',array('class'=>'small_input_s'))}}
   <p class="error">
             <!-- {{ $errors->first('right_view') }}-->
           </p> 
   </div>
   
   <div class="main_view">
       <div class="image_lbl">  
    {{ Form::label('back_view','Back View')}} 
    </div>
    {{  Form::file('back_view',array('class'=>'small_input_s'))}}
  <p class="error">
              <!--{{ $errors->first('back_view') }}-->
           </p>
           
           </div>
           
           <?php if(!empty($img_name))
		   {   
		      foreach($img_name as $img)
			  {
				 // print_r($img);
				  ?>
                 {{ HTML::image('/public/uploads/thumb/thumb_'.$img)}}
                 <?php 
			  }
			  
		   }?>
          </div> 
           
        {{ Form::label('product_discription', 'Product Discription') . Form::textarea('product_discription', $pro_data[0]->discription,array('class'=>'smallInput wide')) }}
        <p class="error">
              {{ $errors->first('product_discription') }}
           </p>
        
        <?php 
	}
	else
	{?>
    	{{ Form::label('product_name', 'Product Name') . Form::text('product_name', Input::old('product_name'),array('class'=>'smallInput wide')) }}
        <p class="error">
              {{ $errors->first('product_name') }}
           </p>
           
           
            <!--WYSIWYG Editor is linked to the textarea with id: #wysiwyg-->
       {{ Form::label('product_price', 'Product Price') . Form::text('product_price', Input::old('product_price'),array('class'=>'smallInput wide')) }}
       <p class="error">
              {{ $errors->first('product_price') }}
           </p>
       
        {{ Form::label('product_quantity', 'Product Quantity') . Form::text('product_quantity', Input::old('product_quantity'),array('class'=>'smallInput wide')) }}
        <p class="error">
              {{ $errors->first('product_quantity') }}
           </p>
        
        {{ Form::label('product_model', 'Product Model') . Form::text('product_model', Input::old('product_model'),array('class'=>'smallInput wide')) }}
        <p class="error">
              {{ $errors->first('product_model') }}
           </p>
           
           
           <div class="image_div">
            <h1>Product Images</h1>
            
            
        <div class="main_view">
       <div class="image_lbl">     
  {{ Form::label('front_view','Front View')}}
  </div>
  {{Form::file('front_view',array('class'=>'small_input_s'))}}
  <p class="error">
              <!--{{ $errors->first('front_view') }}-->
           </p>
  </div>
  
  <div class="main_view">
       <div class="image_lbl">  
   {{ Form::label('left_view','Left View')}}
   </div>
   {{Form::file('left_view',array('class'=>'small_input_s'))}}
   <p class="error">
              <!--{{ $errors->first('left_view') }}-->
           </p>
  </div>
  
  <div class="main_view">
       <div class="image_lbl">  
  
   {{ Form::label('right_view','Right View')}}
   </div>
   {{  Form::file('right_view',array('class'=>'small_input_s'))}}
   <p class="error">
             <!-- {{ $errors->first('right_view') }}-->
           </p> 
   </div>
   
   <div class="main_view">
       <div class="image_lbl">  
    {{ Form::label('back_view','Back View')}} 
    </div>
    {{  Form::file('back_view',array('class'=>'small_input_s'))}}
  <p class="error">
              <!--{{ $errors->first('back_view') }}-->
           </p>
           
           </div>
          </div> 
           
        {{ Form::label('product_discription', 'Product Discription') . Form::textarea('product_discription', Input::old('product_discription'),array('class'=>'smallInput wide')) }}
        <p class="error">
              {{ $errors->first('product_discription') }}
           </p>
     <?php 
	}?>
    
    
    
       
        
         
       <br/>
       
        <?php 
	if(isset($pro_data) && !empty($pro_data))
	{
		?>
        
        {{ Form::hidden('pro_id',$pro_data[0]->product_id)}}
        
         <div class="btn">
            <span></span>
		  {{ Form::submit('Update', array('class'=>'button'))}}
          </div>
            {{ Form::token() . Form::close() }}<br>
        <?php 
	}
	else
	{?>
       <div class="btn">
            <span></span>
		  {{ Form::submit('Add New', array('class'=>'button'))}}
          </div>
            {{ Form::token() . Form::close() }}<br>

<?php }
?>
    <div class="clear"></div><br>
    <!--NOTIFICATION MESSAGES-->
        <!--<p id="success" class="info"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
        <p id="error" class="info"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
        <p id="warning" class="info"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
        <p id="info" class="info"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>   --> 
    </div>
   
@stop