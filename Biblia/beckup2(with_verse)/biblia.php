<style>
@media screen and (max-width: 980px) {
   #text {
      font-size:1.1em;
   }
 }
   #table td {
      text-align: center;
   }
   #text td {
      text-align: left;
   }
   #text {

   }
   h5{
	  color:grey;
   }
 </style>
 <script type="text/javascript" src="/Biblia/ZeroClipboard.js"></script>

  <body onload="location += '#verse';">
 <?php 
 
//header("Content-Type: text/html; charset=utf-8");
//echo "<a name='verse'></a>";
echo "<a href='#verse'>к стиху</a>";
include("spisok.php");
echo '<table style="font-size: 6pt;table-layout:fixed;" id=table width="100%">
<tr><th ><h4>ВЫБОР КНИГ БИБЛИИ</h4></th></tr>
<tr><th ><h4 >Ветхий Завет</h4></th></tr>
<tr><td ><h5 >Пятикнижие Моисея</h5></td></tr>
<tr><td>';
for ($i=1;$i<6;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
echo "</td></tr><td><h5 >Книги Исторические</h5></td></tr>
<tr><td>";

for ($i=6;$i<18;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
for ($i=71;$i<74;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> ";
}
for ($i=77;$i<78;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> ";
}
for ($i=67;$i<70;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> ";
}
echo "</td></tr><td><h5 >Книги Учительные</h5></td></tr>
<tr><td>";
for ($i=18;$i<23;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
for ($i=75;$i<77;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
echo "</td></tr><td><h5 >Книги Пророческие</h5></td></tr>
<tr><td>";
for ($i=23;$i<40;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
for ($i=70;$i<71;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
echo '</td></tr><tr><th ><h4>Новый завет</h4></th></td></tr><tr><td >';
for ($i=40;$i<45;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
echo '</td></tr>
<tr><td ><h5 >Соборные послания</h5></td></tr>
<tr><td>';
for ($i=45;$i<52;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
echo '</td></tr>
<tr><td ><h5 >Послания Апостола Павла</h5></td></tr>
<tr><td>';
for ($i=52;$i<66;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
echo '</td></tr><tr><td>';
for ($i=66;$i<67;$i++){
	echo "<a href='' id=$i class=book>$FullName[$i]</a> "; 
}
echo'</td></tr>';
$s='Толкования';
$m[0]='блж.Феофилакт Болг.';
$m[1]='А.Лопухин';
$m[2]='У.Баркли';
$m[3]='А. Иванов';
$m[4]='еп. Михаил (Лузин)';
$m[5]='св. Иоанн Златоуст';
$m[6]='Климент Алекс.';
echo "<tr><td >
<h4 id=interpretation>$s</h4></td></tr><tr>
<td >";
for ($j=0;$j<sizeof($m);$j++){
	echo "<a href='' id=$j class=interpretation>$m[$j]</a> "; 
}
echo "</td></tr>";
//++
if (!isset($_REQUEST['id_book']))
	$id_book=1;
else 
	$id_book=$_REQUEST['id_book'];
$book_name=$FullName[$id_book];
if (!isset($_REQUEST['chapter']))
	$chapter=1;
else 
    $chapter=$_REQUEST['chapter'];
if (!isset($_REQUEST['verse']))
	$verse=0;
else 
    $verse=$_REQUEST['verse'];
	
$book_name=$FullName[$id_book];
echo "<tr><td ><div style='display:-webkit-inline-box;'><h4 id=book class=$id_book>$book_name</h4><h4>, </h4><h4 id=chapter> $chapter</h4></div>
<h4>Главы</h4></td></tr>";
echo "<tr><td ><div id=chapters>";

for ($j=1;$j<=$ChapterQty[$id_book];$j++){
		echo "<a href='' id=$j class=chapter>$j</a> "; 
}
//++
echo "</div></td></tr>";
echo"</table>";
//echo"<tr><td >";
//echo "<table id=text width='100%' style='font-size:1.5em;';>";
//echo "<div style='overflow: scroll;max-width:3'>";
echo "<table id=text width='100%'>";
//echo "<tr ><th>№</th><th>Синодальный<input type='checkbox' checked='checked' id=synodal></th><th>Славянский<input type='checkbox' checked='checked' id=slavic></th></tr>";
echo "<script>
  var id_book=$('#book').attr('class');
    	$('#chapter').html($chapter);
  			slavicChecked = $('#slavic').is(':checked');
  			synodalChecked = $('#synodal').is(':checked');
  			if (!slavicChecked&&synodalChecked) checked='synodal';
  			else if (slavicChecked&&!synodalChecked) checked='slavic';
  			else checked='all';
  			$.ajax({
  				type: 'get',
  				url: 'http://dishupravoslaviem.ru/Biblia/file.php',
 				data: {'id_book':id_book,'chapter':$chapter,'translate':checked,'verse':$verse},
 				success: function(data){
				//alert(data);
				$('#text').html(data);
				} 
			});</script>";

echo '</table>';
//echo "<a href='#verse'>Наверх</a>";
//echo "<a name='verse'>aaa</a>";
//echo '</div>';
//echo '</table>';
?>

<script>
$( document ).ready(function() {
//onload = function () {location += '#verse'};
//onload = function () {document.getElementsByName ('verse').scrollIntoView()};
	$( ".book" ).click(function() {
    	id_book=$(this).attr('id');
 //chapter=$("#chapter").text();
     slavicChecked = $("#slavic").is(':checked');
   synodalChecked = $("#synodal").is(':checked');
  if (!slavicChecked&&synodalChecked) checked='synodal';
  else if (slavicChecked&&!synodalChecked) checked='slavic';
  else checked='all';
    	//alert(id_book);
    //	alert(id_book);
    	    	$("#book").attr('class',id_book);	
    	    	$("#chapter").html(1);
    	$.ajax({
  			type: 'get',
  			url: 'http://dishupravoslaviem.ru/Biblia/ajax_book.php',
 			data: {'id_book':id_book},
 			success: function(data){
			//alert(data);
			$("#book").html(data);
			} 
		});
    	$.ajax({
  			type: 'get',
  			url: 'http://dishupravoslaviem.ru/Biblia/ajax_chapters.php',
 			data: {'id_book':id_book},
 			success: function(data){
			//alert(data);
			$("#chapters").html(data);
			} 
		});
    	$.ajax({
  			type: 'get',
  			url: 'http://dishupravoslaviem.ru/Biblia/file.php',
 			data: {'id_book':id_book,'chapter':1,'translate':checked},
 			success: function(data){
			//alert(data);
			$("#text").html(data);
			} 
		});
		//alert(screen.width);
		//$("#table").css('width',"100px");
		//onload();
		//$("#text").scrollIntoView();
 	   	return false;
 	});
	$( ".chapter" ).click(function() {
  var id_book=$("#book").attr('class');
  //var name_book=$("#book").text();
    	chapter=$(this).attr('id');
    //	$("#book").html(name_book);
    	$("#chapter").html(chapter);
    	//alert(chapter);
 		//alert(id_book);
 		$.ajax({
  			type: 'get',
  			url: 'http://dishupravoslaviem.ru/Biblia/file.php',
 			data: {'id_book':id_book,'chapter':chapter,'translate':checked},
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