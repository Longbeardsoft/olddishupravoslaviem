<p>Введите числа с картинки: <br>
<?php
$i=1;
do
{
$num[$i] = mt_rand(0,9);
echo "<img src='http://".$_SERVER['SERVER_NAME']."/FormEmail/Numbers/".$num[$i].".jpg' border='0' width=50px height=50px align='bottom' vspace='5px'>";
$i++;
}
while ($i<6);
$captcha = $num[1].$num[2].$num[3].$num[4].$num[5];
?>
<input name="captcha" type="hidden" value="<?php echo $captcha ;?>">