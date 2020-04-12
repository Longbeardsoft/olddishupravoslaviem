 <?php
// Получает содержимое файла в виде массива. В данном примере мы используем
// обращение по протоколу HTTP для получения HTML-кода с удаленного сервера.
$id_book=$_REQUEST['id_book'];
$chapter=$_REQUEST['chapter'];
$verse=$_REQUEST['verse'];
include("spisok.php");
$file=$PathName[$id_book];
$ShortName=$ShortName[$id_book];
$lines = file("Bible/$file");
$lines_slavic = file("Bible-slavic/$file");
$i=0;
if (isset($_REQUEST['translate'])){
	$translate=$_REQUEST['translate'];
}
//echo "<a href='#verse'>Наверх</a>";
if ($translate=='all') 
	echo "<tr ><th>№</th><th>Синодальный<input type='checkbox' checked='checked' id=synodal></th><th>Славянский<input type='checkbox' checked='checked' id=slavic></th><th><button id='d_clip_button' style='border:1px solid black; padding:20px;'>Копировать в буфер</button></th></tr>";
else if	($translate=='synodal')
	echo "<tr ><th>№</th><th>Синодальный<input type='checkbox' checked id=synodal></th><th><button id='d_clip_button' style='border:1px solid black; padding:20px;'>Копировать в буфер</button></th></tr>";
else if	($translate=='slavic')
	echo "<tr ><th>№</th><th>Славянский<input type='checkbox' checked id=slavic></th><th ><button id='d_clip_button' style='border:1px solid black; padding:20px;'>Копировать в буфер</button></th></tr>";
// Осуществим проход массива и выведем содержимое в виде HTML-кода вместе с номерами строк.

foreach ($lines as $line_num => $line) {
    $line = iconv('windows-1251', 'UTF-8', $line);
    //$line = mb_convert_encoding($line, "utf-8");
    if (preg_match('/^=== ([0-9#]{1,3}) ===/',$line,$matches))
    	$m=$matches[1];//{ var_dump($matches[1]);var_dump($chapter);echo '<br>';}
    	if (strcasecmp($m, $chapter) == 0) 
    		if (preg_match('/^([0-9#]{1,3})\s(\D+)/',$line,$matches)){
    			$numVerse[$i]=$matches[1];
				$textVerse[$i]=$matches[2];
				$i++;
		//		echo "<tr><td>$numVerse</td><td>$textVerse</td><td>empty</td></tr>";
			}
		}
$i=0;
foreach ($lines_slavic as $line_num => $line) {
    $line = iconv('windows-1251', 'UTF-8', $line);
    //$line = mb_convert_encoding($line, "utf-8");
    if (preg_match('/^=== ([0-9#]{1,3}) ===/',$line,$matches))
    	$m=$matches[1];//{ var_dump($matches[1]);var_dump($chapter);echo '<br>';}
    	if (strcasecmp($m, $chapter) == 0) 
    		if (preg_match('/^([0-9#]{1,3})\s(\D+)/',$line,$matches)){
    			$numVerseSlavic[$i]=$matches[1];
				$textVerseSlavic[$i]=$matches[2];
				$i++;
		//		echo "<tr><td>$numVerse</td><td>$textVerse</td><td>empty</td></tr>";
			}
		}
     echo '';
	//echo'<tr><td><div id="post-shortlink" ></div><button id="copy-button" data-clipboard-target="" >Copy</button></td></tr>';
	//echo '<tr><td>aa</td></tr>';

	for ($i=0;$i<sizeof($numVerse);$i++) {
	if ($translate=='all') 
		if ($i==$verse-1) 
			echo "<tr ><td><a name='verse' style='display:block;margin-bottom:70px; margin-top:-550px'></a></td></tr><tr style='background:lightgrey;'><td width=3%>$ShortName$chapter:$numVerse[$i]</td><td width=50%>$textVerse[$i]</td><td width=50%>$textVerseSlavic[$i]</td><td class=verse id=$i >X</td></tr>";
		else 
		   	echo "<tr style='background:white;'><td  width=3%>$ShortName$chapter:$numVerse[$i]</td><td width=50%>$textVerse[$i]</td><td width=50%>$textVerseSlavic[$i]</td><td class=verse id=$i>X</td></tr>";
	else if	($translate=='synodal')
		if ($i==$verse-1)
			echo "<tr ><td><a name='verse' style='display:block;margin-bottom:70px; margin-top:-550px'></a></td></tr><tr style='background:lightgrey;'><td>$ShortName$chapter:$numVerse[$i]</td><td>$textVerse[$i]</td><td class=verse id=$i>X</td></tr>";
		else 
			echo "<tr style='background:white;'><td>$ShortName$chapter:$numVerse[$i]</td><td>$textVerse[$i]</td><td class=verse id=$i>X</td></tr>";
    else if	($translate=='slavic')
			if ($i==$verse-1)
				echo "<tr ><td><a name='verse' style='display:block;margin-bottom:70px; margin-top:-550px'></a></td></tr><tr style='background:lightgrey;'><td>$ShortName$chapter:$numVerse[$i]</td><td>$textVerseSlavic[$i]</td><td class=verse id=$i>X</td></tr>";
			else 
				echo "<tr style='background:white;'><td>$ShortName$chapter:$numVerse[$i]</td><td>$textVerseSlavic[$i]</td><td class=verse id=$i>X</td></tr>";
}
//echo "<tr><td><a href='#verse'>Наверх</a></td></tr>";
?>

<script>
		//new Clipboard('.verse'); 
		$( document ).ready(function() {
			 var vers;
			 $("#d_clip_button").click(function () {
			 vers.css("background","lightgrey");
			 temp=null;
			 alert("Данные записаны в буфер обмена");	
		 });
		  $(".verse").click(function () { 
				if (vers!=null) { 
					vers.css("background","white");
					vers=$(this);
				} else {
					vers=$(this);
				}
					index=vers.attr('id');
					vers.css("background","lightblue");
					index++;
					var id_book=$("#book").attr('class');
					chapter=$("#chapter").text();
					var text='http://dishupravoslaviem.ru/biblia/?id_book='+id_book+'&chapter='+chapter+'&verse='+index;
					var client = new ZeroClipboard($("#d_clip_button"), {
						moviePath : '/Biblia/ZeroClipboard.swf'
					}); 
					client.setText(text);
		   });
 	
	$("input:checkbox").change(function () {
  var slavicChecked = $("#slavic").is(':checked');
  var synodalChecked = $("#synodal").is(':checked');
  if (!slavicChecked&&synodalChecked) checked='synodal';
  else if (slavicChecked&&!synodalChecked) checked='slavic';
  else checked='all';
  var id_book=$("#book").attr('class');
    	    	chapter=$("#chapter").text();
    	$.ajax({
  			type:'get',
  			url: '/Biblia/file.php',
 			data: {'id_book':id_book,'chapter':chapter,'translate':checked,'verse':"<?php echo $verse;?>"},
 			success: function(data){
			//alert(data);
			$("#text").html(data);
			} 
		});
	});});
 	</script>