<div id='doc'>
<?php 
//header("Content-Type: text/html; charset=utf-8");
if (isset($_POST['id_book'])){
	$id_book=$_REQUEST['id_book'];
	include("spisok.php");
}else {
	$id_book=1;
	include("Biblia/spisok.php");
}
echo '<table style="font-size: 6pt;" id=table style="table-layout:fixed;" width="100%">
<tr><th><h4>ВЫБОР КНИГ БИБЛИИ</h4></th></tr>
<tr><td style="text-align:center;">';
for ($i=1;$i<78;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
echo '</td></tr>';
$i=$id_book;
$chapter=1;
echo "<tr><td style='text-align:center;'><h4 id=book>$FullName[$i], $chapter</h4></td></tr>";
echo "<tr><td style='text-align:center;'><div id=chapters>";
for ($j=1;$j<=$ChapterQty[$i];$j++){
	echo "<a href='' id=$j class=chapter>$j</a> "; 
}
$s='Толкования';
$m[0]='блж.Феофилакт Болг.';
$m[1]='А.Лопухин';
$m[2]='У.Баркли';
$m[3]='А. Иванов';
$m[4]='еп. Михаил (Лузин)';
$m[5]='св. Иоанн Златоуст';
$m[6]='Климент Алекс.';
echo "</div></td></tr><tr><td style='text-align:center;'>
<h4 id=interpretation>$s</h4></td></tr><tr>
<td style='text-align:center;'>";
for ($j=0;$j<sizeof($m);$j++){
	echo "<a href='' id=$j class=interpretation>$m[$j]</a> "; 
}
echo "</td></tr><tr><td>";
//echo "<table id=text width='100%' style='font-size:1.5em;';>";
//echo "<div style='overflow: scroll;max-width:3'>";
echo "<table id=text width='100%'>";

if ($chapter==1) echo "<script>
			$.ajax({
  			type: 'post',
  			url: '/Biblia/file.php',
 			data: {'id_book':".$id_book.",'chapter':1},
 			success: function(data){
			//alert(data);
			$('#text').html(data);
			} 
		});</script>";

echo '</table>';
//echo '</div>';
echo '</table>';
?>
<script>
$( document ).ready(function() {
//$("#table").css({'width',screen.width});
  var id_book="<?php echo $id_book;?>";
  var name_book="<?php echo $FullName[$id_book];?>";
  var chapter;
  //var checked = $("#slavic").is(':checked');
  //if (checked) slavic=1; else slavic=0;
 // alert($("#slavic").attr('type'));
    // Handler for .ready() called.
	$( ".book" ).click(function() {
    	id_book=$(this).attr('id');
    	//alert(id_book);
 		$.ajax({
  			type: 'post',
  			url: '/Biblia/biblia.php',
 			data: {'slavic':slavic,'id_book':id_book,'chapter':1},
 			success: function(data){
			//alert(data);
			$("#doc").html(data);
			} 
		});
		//alert(screen.width);
		//$("#table").css('width',"100px");
 	   	return false;
 	});
 	$( ".chapter" ).click(function() {
    	chapter=$(this).attr('id');
    	$("#book").html(name_book+', '+chapter)
    	//alert(chapter);
 		//alert(id_book);
 		$.ajax({
  			type: 'post',
  			url: '/Biblia/file.php',
 			data: {'id_book':id_book,'chapter':chapter},
 			success: function(data){
			//alert(data);
			$("#text").html(data);
			} 
		});
		return false;
 	});
});//ready
</script>
</div>