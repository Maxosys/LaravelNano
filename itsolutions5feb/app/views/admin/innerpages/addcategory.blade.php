@extends('layouts.admin')
@section('content')
    <div class="grid_9">
    <h1 class="dashboard">Category</h1>
    </div>
    <!--RIGHT TEXT/CALENDAR-->
    <div id="eventbox" class="grid_6"><a class="inline_calendar" href="#">You don't have any events for today! Yay!</a>
    	<div class="hidden_calendar"></div>
    </div>
    <!--RIGHT TEXT/CALENDAR END-->
    <div class="clear">
    </div>
    <!--  TITLE END  -->    
    <!-- #PORTLETS START -->
    <div id="portlets">
    <!-- FIRST SORTABLE COLUMN START -->
      <div id="left" class="column">
      <!--THIS IS A PORTLET-->
		<div class="portlet">
            <div class="portlet-header">{{HTML::image('/assets/admin/images/icons/chart_bar.gif')}} Visitors - Last 30 days</div>
            <div class="portlet-content">
            <!--THIS IS A PLACEHOLDER FOR FLOT - Report & Graphs -->
            <div style="" id="placeholder"></div>
            </div>
        </div>      
      <!--THIS IS A PORTLET-->
        <div class="portlet">
		<?php if(isset($catg)){ //echo "<pre>"; print_r($catg);
		?>
        <h3>Edit Category</h3>
        <?php 
		}
		else
		{?>
        <h3>Add New Category</h3>
        <?php
		}?>
		<div class="portlet-content">
        <?php if(isset($catg)){
			?>
		  <p>You can edit the category and its mata tag discription of the list from here.</p>
		 
		  {{ Form::open(array('url'=>'admincate_edit/'.$catg[0]->cate_id))}}
		 <!--   <label>Some title</label>
		     <input type="text" class="smallInput" id="textfield" name="textfield">-->
              {{ Form::label('cate_name', 'Category Name') . Form::text('cate_name', $catg[0]->cate_name,array('class'=>'smallInput')) }}
              <p class="error">
              {{ $errors->first('cate_name') }}
           </p>
             
			<!--<label>Large input box</label>
            <input type="text" class="largeInput" id="textfield2" name="textfield2">-->
            {{ Form::label('metatag', 'Meta Tag') . Form::textarea('metatag', $catg[0]->mata_tag,array('class'=>'smallInput')) }}
             <p class="error">
              {{ $errors->first('metatag') }}
           </p>
            
            {{ Form::label('discription', 'Discription') . Form::textarea('discription', $catg[0]->discription,array('class'=>'smallInput')) }}
            <p class="error">
              {{ $errors->first('discription') }}
           </p>
            
            
            
            <div class="btn">
            <span></span>
		  {{ Form::submit('Update', array('class'=>'button'))}}
          </div>
            {{ Form::token() . Form::close() }}
            <?php 
			}
			else
			{?>
            
            <p>You can add the new category and its mata tag discription to the list from here.</p>
		 
		  {{ Form::open(array('action'=>'AdminController@addcategory'))}}
		 <!--   <label>Some title</label>
		     <input type="text" class="smallInput" id="textfield" name="textfield">-->
              {{ Form::label('cate_name', 'Category Name') . Form::text('cate_name', Input::old('cate_name'),array('class'=>'smallInput')) }}
              <p class="error">
              {{ $errors->first('cate_name') }}
           </p>
             
			<!--<label>Large input box</label>
            <input type="text" class="largeInput" id="textfield2" name="textfield2">-->
            {{ Form::label('metatag', 'Meta Tag') . Form::textarea('metatag', Input::old('metatag'),array('class'=>'smallInput')) }}
            <p class="error">
              {{ $errors->first('metatag') }}
           </p>
            
            {{ Form::label('discription', 'Discription') . Form::textarea('discription', Input::old('discription'),array('class'=>'smallInput')) }}
            <p class="error">
              {{ $errors->first('discription') }}
           </p>
            
            <div class="btn">
            <span></span>
		  {{ Form::submit('Add New', array('class'=>'button'))}}
          </div>
            {{ Form::token() . Form::close() }}
            <?php 
			}?>
		  <p>&nbsp;</p>
          
		</div>
        </div>
      </div>
      <!-- FIRST SORTABLE COLUMN END -->
      <!-- SECOND SORTABLE COLUMN START -->
      <div class="column">
      <!--THIS IS A PORTLET-->        
      <div class="portlet">
		<!--<div class="portlet-header">{{HTML::image('/assets/admin/images/icons/comments.gif')}}Latest Comments</div>-->
<?php if(isset($sucess))
		{?>
		<div class="portlet-content">
        
         <p id="success" class="info"><span class="info_inner">{{ $sucess}}</span></p>
        
    <!--<p id="error" class="info"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
    <p id="warning" class="info"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
<p id="info" class="info"><span class="info_inner">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</span></p>
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit--></div>
       </div> 
        <?php 
		}
		?>   
      <!--THIS IS A PORTLET--> 
      <div class="portlet">
		<div class="portlet-header">{{HTML::image('/assets/admin/images/icons/feed.gif')}}List of Categories <span style="float:right;margin-right: 131px;">Action</span></div>
        
		<div class="portlet-content">
        <ul class="news_items">
        <?php
//echo "<pre>";
		// print_r($category);
		foreach($category as $cate)
		{
		
		?>
        	<li>
            <div class="catname">
			<?php //print_r($cate);
			echo $cate->cate_name; ?>
            </div>
            <div class="link">
            <a href="{{ URL::action('AdminController@edit_category',array('id'=>$cate->cate_id))}}" class="edit_icon" title="Edit"></a> 
                
                <a href="{{ URL::action('AdminController@delete_category',array('id'=>$cate->cate_id))}}" class="delete_icon" title="Delete" onclick="if(!confirm('Are you sure to delete this item?')){return false;};"></a>
                </div>
                
            </li>
            
            <?php 
		}?>
            <!--<li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. Etiam est dui,  rutrum nec dictum vel, accumsan id sem. </li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. Etiam est dui,  rutrum nec dictum vel, accumsan id sem. </li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. Etiam est dui,  rutrum nec dictum vel, accumsan id sem. </li>
            <li>Nunc convallis, enim quis tincidunt dictum, ante ipsum  interdum massa, consequat sodales arcu magna nec eros.<a href="#"> Vivamus nec  placerat odio.</a> Sed nec mi sed orci mattis feugiat. </li>-->
        </ul>
        <a href="{{ action('AdminController@showproducts')}}">» View all products</a>
        </div>
       </div>                         
    </div>
	<!--  SECOND SORTABLE COLUMN END -->
    <div class="clear"></div>
    <!--THIS IS A WIDE PORTLET-->
    
<!--  END #PORTLETS -->  
   </div>
   </div>
   
 @stop
  