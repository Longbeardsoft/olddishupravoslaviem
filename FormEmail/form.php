<?php
//Если форма отправлена
  if(isset($_POST['submit'])) {
if (isset($_POST['captcha_validation'])){$captcha_validation = $_POST['captcha_validation']; if ($captcha_validation == '') {unset($captcha_validation);}}
if (isset($_POST['captcha'])){$captcha = $_POST['captcha'];}
 
  //Проверка Поля ИМЯ
  if(trim($_POST['contactname']) == '') {
  $hasError = true;
  } else {
  $name = trim($_POST['contactname']);
  }
  $surname = trim($_POST['surname']);
//Проверка правильности ввода EMAIL
  if(trim($_POST['country']) == '')  {
  $hasError = true;
  } else {
  $country = trim($_POST['country']);
  }
//Проверка правильности ввода EMAIL
  if(trim($_POST['city']) == '')  {
  $hasError = true;
  } else {
  $city = trim($_POST['city']);
  }
  if(!isset($_POST['email']))  {
  $hasError = true;
  } else {
  $email = $_POST['email'];
  }

 //Проверка наличия ТЕКСТА сообщения
  if(trim($_POST['message']) == '') {
  $hasError = true;
  } else {
  if(function_exists('stripslashes')) {
  $comments = stripslashes(trim($_POST['message']));
  } else {
  $comments = trim($_POST['message']);
  }

$uploaddir=$_SERVER['DOCUMENT_ROOT'].'FormEmail/Fotos/';
if(isset($_FILES['foto'])){
    $prev = iconv("UTF-8","Windows-1251", $uploaddir.basename($_FILES['foto']['name']));
    $file = "http://".$_SERVER['SERVER_NAME'].'/FormEmail/Fotos/'.basename($_FILES['foto']['name']);
	move_uploaded_file($_FILES['foto']['tmp_name'],$prev);
}
//Если ошибок нет, отправить email
if ($captcha == $captcha_validation)
{
if(!isset($hasError)) {
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
  $emailTo = 'a.badanov@dishupravoslaviem.ru'; //Сюда введите Ваш email
  $subject='Дышу Православием';
  $body = "Пришло новое сообщение от $surname $name из города $city страны $country<br>
  Email: $email<br>
  Сообщение: $comments<br>
  Фото<br><img width=300px height=300px src=$file >";
  if(mail($emailTo, $subject, $body, $headers)) echo "Письмо успешно отправлено";
  else echo "Ощибка отправки письма";
  $emailSent = true;
  }
}else echo "Вы неправильно ввели цифры с картинки";
}
}
//header( "Content-Type: text/html; charset=utf-8" );
//header('Location: http://dishupravoslaviem.ru/zadati-vopros/');
?>