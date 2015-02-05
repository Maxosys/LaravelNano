@extends('layouts.admin')   <!--default is the layout name which we want to use in site.-->
@section('content')
 <!--  TITLE START  --> 
    
    <!--THIS IS A WIDE PORTLET-->
    <div class="portlet">
        <div class="portlet-header fixed">{{HTML::image('/assets/admin/images/icons/user.gif')}} Last Registered users Table Example</div>
		<div class="portlet-content nopadding">
        
            
        {{ Form::open(array('url'=>'group_action','id'=>'grouped_form'))}}
        
          <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
            <thead>
              <tr>
                <th width="34" scope="col"><input type="checkbox" name="allbox" id="allbox" onclick="checkAll(<?php echo count($user);?>)" /></th>
                <!--<th width="136" scope="col">Name</th>-->
                <th width="102" scope="col">Username</th>
                <th width="109" scope="col">Ragistraion Date</th>
                <!--<th width="129" scope="col">Location</th>-->
                <th width="171" scope="col">E-mail</th>
                <th width="123" scope="col">Status</th>
                <th width="90" scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php 
			$i=1;
			foreach($user as $user)
			{?>
              <tr>
                <td width="34"><label>
                    <input type="checkbox" name="check_<?php echo $user->user_id?>" value="<?php echo $user->user_id?>" id="checkbox_<?php echo $i?>"/>
                </label>
                <!--{{ Form::checkbox('check_'.$user->user_id,'',false,array('id'=>'checkbox_'.$i))}}-->
                </td>
                <td><?php echo $user->name;?></td>
               <!-- <td>stephen</td>-->
                <td><?php echo $user->created_at;?></td>
                <!--<td>Los Angeles, CA</td>-->
                <td><?php echo $user->email;?></td>
                <td><?php if($user->active=='y'){ echo "Active"; }else{  echo "Inactive"; }?></td>
                <td width="90"><a href="{{ URL::action('AdminController@approve_user',array('id'=>$user->user_id))}}" class="approve_icon" title="Approve"></a> <a href="{{ URL::action('AdminController@reject_user',array('id'=>$user->user_id))}}" class="reject_icon" title="Reject"></a> </a> <a href="{{ URL::action('AdminController@delete_user',array('id'=>$user->user_id))}}" class="delete_icon" title="Delete" onclick="if(!confirm('Are you sure to delete this item?')){return false;};"></a></td>
              </tr>
             <?php
			 $i++; 
			 }
			 
			 ?>
             
             <tr>
             <td colspan="6">
             <a href="#" class="approve_icon" title="Approve" onclick="get_allid('approve')"></a> <a href="#" class="reject_icon" title="Reject" onclick="get_allid('reject')"></a> </a> <a href="#" class="delete_icon" title="Delete" onclick="if(!confirm('Are you sure to delete this item?')){return false;}else{ get_allid('delete')};"></a>

             </td>
             
             
             </td>
             </tr>
            </tbody>
          </table>
       
            {{ Form::token() . Form::close() }}
            
		</div>
      </div>
<!--  END #PORTLETS -->  
   </div>
   
    <div class="clear"> </div>
    @stop
    
    <script>
	function checkAll(num)
	{
		//alert(num);
		for(i=1;i<=num;i++)
		{
			 //$("#checkbox_"+i).attr("checked","checked");
			if($("#checkbox_"+i).is(':checked'))
			{
				//alert("checked");
				$("#checkbox_"+i).prop("checked",false)
			}
			else
			{
				//alert("not checked");
               $("#checkbox_"+i).prop("checked","checked") // for checked attribute it returns true/false;
                                        // return value changes with checkbox state
   
			}
					
		}
	}
	
	function get_allid(action)
	{
		//alert(action);
		$(".act_div").remove();
		$('<div class="act_div"><input type="hidden" name="action" value="'+action+'" id="action"/></div>').appendTo("#allbox");
		$("#grouped_form").submit();
	}
	</script>