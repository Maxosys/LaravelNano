@extends('layouts.admin')   <!--default is the layout name which we want to use in site.-->
@section('content')
 <!--  TITLE START  --> 
    
    <!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
        <div class="portlet-header fixed">{{HTML::image('/assets/admin/images/icons/user.gif')}} Orders of the users with their details</div>
		<div class="portlet-content nopadding">
        <form action="" method="post">
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr>
                <th width="34" scope="col"><input type="checkbox" name="allbox" id="allbox" onclick="checkAll()" /></th>
                <!--<th width="136" scope="col">Name</th>-->
                <th width="102" scope="col">Product Name</th>
                <th width="109" scope="col">Transaction id</th>
                <!--<th width="129" scope="col">Location</th>-->
                <th width="171" scope="col">Payment Status</th>
                <th width="123" scope="col">Quantity</th>
                <th width="90" scope="col">Transaction Time</th>
              </tr>
            </thead>
            <tbody>
            <?php 
			//echo "<pre>";
			//print_r($order);
			
			$k=1;?>
            <?php 
			foreach($order as $buyer)
			{
				$user=DB::table('laravel_order')->where('user_id',$buyer->user_id)->get();
				//$pro_name=DB::table('laravel_products')->where('product_id',$buyer->product_id)->get();
				//print_r($user);
				
				?>
            
            <tr>
            <th><?php echo $k;?></th>
            <th><?php echo $buyer->name?></th>
            <th colspan="2">User Address:<br/> <?php echo $buyer->address?>,<?php echo $buyer->city?>,<?php echo $buyer->state?>,<?php echo $buyer->country?>, Email-id: <?php echo $buyer->email?></th>
            <th colspan="2">Shipping Address:<br/> <?php echo $buyer->s_address?>,<?php echo $buyer->s_city?>,<?php echo $buyer->s_state?>,<?php echo $buyer->s_country?> , Email-id: <?php echo $buyer->email?></th>
            </tr>
            
            
            <?php 
			$i=1;
			foreach($user as $orderdetail)
			{?>
              <tr>
                <td width="34"><?php echo "(".$i.")";?></td>
                <td><?php echo $buyer->pro_name?></td>
               <!-- <td>stephen</td>-->
                <td><?php echo $orderdetail->transactionid;?></td>
                <!--<td>Los Angeles, CA</td>-->
                <td><?php if($orderdetail->order_status=='1'){ echo "Complete";}else{ echo 'Pending';}?></td>
                <td><?php echo $orderdetail->quantity;?></td>
                <td width="90"><?php echo $orderdetail->trans_time;?></td>
              </tr>
              
              
             <?php 
			 $i++;
			}
			$k++;
			 }?>
             
             <tr>
             <td colspan="3">
             <?php /*?><a href="{{ URL::action('AdminController@approve_user',array('id'=>$user->user_id))}}" class="approve_icon" title="Approve"></a> <a href="{{ URL::action('AdminController@reject_user',array('id'=>$user->user_id))}}" class="reject_icon" title="Reject"></a> </a> <a href="{{ URL::action('AdminController@delete_user',array('id'=>$user->user_id))}}" class="delete_icon" title="Delete" onclick="if(!confirm('Are you sure to delete this item?')){return false;};"></a><?php */?>

             </td>
             <td colspan="3">
             </td>
             
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