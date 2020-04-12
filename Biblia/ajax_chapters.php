<?php
	include("spisok.php");
	$id_book=$_REQUEST['id_book'];
	for ($j=1;$j<=$ChapterQty[$id_book];$j++){
		echo "<a href='' id=$j class=chapter>$j</a> "; 
}

?>
<script type="text/javascript">
	$( ".chapter" ).click(function() {
  var id_book=$("#book").attr('class');
  //var name_book=$("#book").text();
    	chapter=$(this).attr('id');
    //	$("#book").html(name_book);
    	$("#chapter").html(chapter);
    	//alert(chapter);
 	//	alert(id_book);
 		$.ajax({
  			type: 'post',
  			url: '/Biblia/file.php',
 			data: {'id_book':id_book,'chapter':chapter,'translate':checked},
 			success: function(data){
			//alert(data);
			$("#text").html(data);
			} 
		});
		var text='http://dishupravoslaviem.ru/biblia/?id_book='+id_book+'&chapter='+chapter;
 	    var title = $(this).html();
        history.pushState({}, title, text);
		return false;
 	});
</script>