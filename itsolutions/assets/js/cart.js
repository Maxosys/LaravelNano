jQuery(document).ready(function($){
	
	$('.delaction').click(function()
	{
		 
		
		 var i=this.id;
		 var delid = $('#del'+i).val();
    		  $.ajax({
		  type : "POST",
   		  data: delid,
		  url : "addtocart?id="+delid,
		  success: function(data){ 
		  $('#cart_sub_head'+delid).fadeOut("slow");
            }
		});
		
	}
	);//$('#sum').text('');
});
function cart(qty,price,i)
{
	var total=qty*price;
	document.getElementById('total'+i).innerHTML=total;
	var elems = document.getElementsByClassName("total");
	var tot=0;
	for(var j=0;j<elems.length;j++)
	{
	 
	 var items=document.getElementsByClassName('total')[j].innerHTML;
	 var b=parseInt(items)
	 tot=eval(tot+parseInt(items));
	 
	
	}
	document.getElementById('sum').innerHTML=tot;
	document.getElementById('gsum').innerHTML=tot;
	 
	
	
}

/*function findTotal(){
    var a = document.getElementsByName('qty');
    var tot=0;
    for(var i=0;i<a.length;i++)
	{
        if(parseInt(a[i].value))
            tot += parseInt(a[i].value);
    }
    document.getElementById('total').value = tot;
}
*/
    

 
/*$('span.total').each(function() {
   	var n = parseFloat($(this).text());
    	total += isNaN(n) ? 0 : n;
	});
	var a=$('#sum').text(total.toFixed(2));
	alert(a);*/