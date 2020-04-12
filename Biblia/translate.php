<?php
if (isset($_REQUEST['slavic'])){
	$slavic=$_REQUEST['slavic'];
}
if ($slavic=='0') 
	echo "<tr ><th>№</th><th>Синодальный <input type='checkbox' id=slavic></th></tr>";
else 
	echo "<tr ><th>№</th><th>Синодальный</th><th>Славянский<input type='checkbox' checked id=slavic></th></tr>";
?>