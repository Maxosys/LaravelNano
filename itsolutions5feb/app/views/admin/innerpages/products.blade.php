@extends('layouts.admin')   <!--default is the layout name which we want to use in site.-->
@section('content')
 <!--  TITLE START  --> 
    
    <!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
        <div class="portlet-header fixed" >{{HTML::image('/assets/admin/images/icons/user.gif')}} Products list <a href="{{ action('AdminController@insertproduct')}}" class="button_ok" style="float:right; margin: 0px;"><span>Add New</span></a></div>
        <div class="clear"></div>
	 <div class="portlet-content nopadding">
        <form action="" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet" >
            <thead>
              <tr>
                <th width="34" scope="col"><!--<input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" />--></th>
                <th width="136" scope="col">Image</th>
                <th width="102" scope="col">Product Name</th>
                <th width="109" scope="col">Price</th>
                <th width="129" scope="col">Quantity</th>
                <th width="171" scope="col">Model</th>
                <th width="123" scope="col">Status</th>
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
                <td>{{HTML::image('/public/uploads/thumb/thumb_'.$image[0])}}</td>
                <td> <?php echo $products->name?> <br/>Category: <?php echo $products->cate_name?></td>
                <td><?php echo $products->price?></td>
                <td><?php echo $products->quantity?></td>
                <td><?php echo $products->model?></td>
                <td><?php echo $products->status?></td>
                <td width="90">
                
                <a href="{{ URL::action('AdminController@approve_product',array('id'=>$products->product_id))}}" class="approve_icon" title="Approve"></a>
                
                <a href="{{ URL::action('AdminController@reject_product',array('id'=>$products->product_id))}}" class="reject_icon" title="Reject"></a> 
                
                <a href="{{ URL::action('AdminController@edit_product',array('id'=>$products->product_id))}}" class="edit_icon" title="Edit"></a> 
                
                <a href="{{ URL::action('AdminController@delete_product',array('id'=>$products->product_id))}}" class="delete_icon" title="Delete" onclick="if(!confirm('Are you sure to delete this item?')){return false;};"></a>
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