jQuery(document).ready(function(){});function wa_pns(posttitle,type){jQuery.ajax({type:'POST',url:wapnsajax.ajaxurl,data:{action:'wa_add_pn',apftitle:posttitle,apfcontents:type},success:function(data,textStatus,XMLHttpRequest){},error:function(MLHttpRequest,textStatus,errorThrown){alert(errorThrown);}});};