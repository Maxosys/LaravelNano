@extends('layouts.admin')   <!--default is the layout name which we want to use in site.-->
@section('content')
 <!--  TITLE START  --> 
    
    <!--THIS IS A WIDE PORTLET-->
    
    
    <style>
	.chose_color{ float:left; width:172px; }
.color_con{ float:left; width:158px; border:1px solid #d2d2d2; height:auto; padding:0px 1px 4px 0px; margin:5px 0 0 10px;}
.sel_color{ float:left; border:1px solid #d2d2d2; width:30px;  cursor:pointer; height:30px; margin:6px 0 0 6px;}
	</style>
    
    
    <div class="portlet">
        <div class="portlet-header fixed" >{{HTML::image('/assets/admin/images/icons/user.gif')}} Products list <a href="{{ action('AdminController@insertproduct')}}" class="button_ok" style="float:right; margin: 0px;"><span>Add New</span></a></div>
        <div class="clear"></div>
	 <div class="portlet-content nopadding">
        <form action="" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet" >
            <thead>
              <tr>
                <th width="34" scope="col"><!--<input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" />--></th>
                
                <th width="102" scope="col">Product Name</th>
                <th width="136" scope="col">Color Available</th>
                
                <th width="109" scope="col">Product image</th>
                
                <th width="90" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php
			//echo "<pre>";
			//print_r($products) ;
			//exit;
			$i=1;
			foreach($products as $products)
			{
				$image=explode(',',$products->product_image);
				?>
              <tr>
                <td width="34"><?php echo $i.'.';?></td>
                
                <td> <?php echo $products->name?> <br/>Category: <?php echo $products->cate_name?></td>
                <td>
                <article class="chse">
                <h3>Choose Color :</h3>
                
                <aside class="chose_color">
                <abbr class="color_con">
                <?php $color=DB::table('laravel_product_color')->where('category_id',$products->cate_id)->where('product_id',$products->product_id)->get();
				//echo "<pre>";
				//print_r($color);
				if(!empty($color))
				{
					
					foreach($color as $color1)
					{
						$img=array();
						if(!empty($color1->images))
						{
					        $img[]=explode(',',$color1->images);
						}
						//print_r($img);
					?>
					
					<abbr class="sel_color" style="background:#<?php echo $color1->color_name?>;" onclick="return show_img('{{ $img[0][0]}}');"></abbr>
                    
					<?php 
					}
				}
				else
				{
					?>
                    <abbr class="sel_color">NA</abbr>
                    <?php 
				}?>
               
                
                
                </abbr>
                </aside>
                
                
                </article>
                
                </td>
                
                
                <td>
                <?php
                if(!empty($color))
				{
					//echo "<pre>";
					//print_r($color);
					
						//print_r($images->images);
						$img1=array();
						if(!empty($color[0]->images))
						{
					        $img1[]=explode(',',$color[0]->images);
						}
						
						if(!empty($img1))
						{
					  //print_r($img);
						
						?>
                        <div class="img_thmb1">
                        
						   {{ HTML::image('/public/uploads/thumb/thumb_'.$img1[0][0])}}
                           
                        </div>
						<?php 
						
						}
					
				}
				else
				{
					echo 'NA';
				}?>
                </td>
                <td width="90">
                
                <a href="{{ URL::action('AdminController@edit_productcolor',array('pro_id'=>$products->product_id, 'cate_id'=>$products->category_id))}}" class="edit_icon" title="Edit"></a> 
                
                <a href="{{ URL::action('AdminController@delete_productcolor',array('id'=>$products->product_id))}}" class="delete_icon" title="Delete" onclick="if(!confirm('Are you sure to delete this item?')){return false;};"></a>
                </td>
              </tr>
              <?php 
			  $i++;
			}?>
              <tr>
              <td colspan="8">
              <?php 
		
		//echo $products->links(); ?>
              </td>
              </tr>
            </tbody>
          </table>
        </form>
		</div>
      </div>
<!--  END #PORTLETS -->  
   </div>
    <div class="clear"> </div>
    @stop
    
    <script>
	function show_img(img_name)
	{
		//alert(img_name);
		$(".img_thmb").remove();
		var img  = '<?php echo URL::asset('public/uploads/thumb/thumb_');?>';
		//alert(img);
		var img_tag = img+img_name;
		
		
		
		$('<div class="img_thmb"><img src="'+img_tag+'"></div>').insertAfter('.img_thmb1');
		
		$(".img_thmb1").hide();
	}
	</script>