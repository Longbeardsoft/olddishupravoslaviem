<?php
// Получает содержимое файла в виде массива. В данном примере мы используем
// обращение по протоколу HTTP для получения HTML-кода с удаленного сервера.
$id_book=$_REQUEST['id_book'];
$chapter=$_REQUEST['chapter'];
include("spisok.php");
$file=$PathName[$id_book];
$lines = file("Bible/$file");
$lines_slavic = file("Bible-slavic/$file");
$i=0;
if (isset($_REQUEST['slavic'])){
	$slavic=$_REQUEST['slavic'];
}
if ($slavic=='0') 
	echo "<tr ><th>№</th><th>Синодальный <input type='checkbox' id=slavic></th></tr>";
else 
	echo "<tr ><th>№</th><th>Синодальный</th><th>Славянский<input type='checkbox' checked id=slavic></th></tr>";
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
for ($i=0;$i<sizeof($numVerse);$i++) {
	if ($slavic=='0') echo "<tr><td>$chapter:$numVerse[$i]</td><td>$textVerse[$i]</td></tr>";
	else echo "<tr><td>$chapter:$numVerse[$i]</td><td>$textVerse[$i]</td><td>$textVerseSlavic[$i]</td></tr>";
	
}
?>
<script>
$("#slavic").change(function () {
    var checked = $("#slavic").is(':checked');
    if (checked) {
    $.ajax({
  		type:'post',
  		url: '/Biblia/file.php',
 		data: {'slavic':'1','id_book':"<?php echo $id_book;?>",
 		'chapter':"<?php echo $chapter;?>"},
 		success: function(data){
		//alert(data);
		$("#text").html(data);
		} 
		});
    } else {
	$.ajax({
  		type:'post',
  		url: '/Biblia/file.php',
 		data: {'slavic':'0','id_book':"<?php echo $id_book;?>",
 		'chapter':"<?php echo $chapter;?>"},
 		success: function(data){
		//alert(data);
		$("#text").html(data);
		} 
		});
    }
});
</script>