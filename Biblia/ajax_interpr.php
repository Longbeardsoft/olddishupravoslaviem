<?php
header('Content-Type: text/html; charset=windows-1251');
$id_interpr=$_REQUEST['id_interpr'];
$id_book=$_REQUEST['id_book'];
$chapter=$_REQUEST['chapter'];
//echo '$id_interpr='.$id_interpr.'$id_book='.$id_book; 
switch ($id_interpr) { 
case 0:
    switch ($id_book) {
	case 53:
		$htm_file='1Co.htm';
		$book_id=1;
		break;
	case 48:
		$htm_file='1Jn.htm';
		$book_id=2;
		break;
	case 46:
		$htm_file='1Pe.htm';
		$book_id=3;
		break;	
	case 59:
		$htm_file='1The.htm';
		$book_id=4;
		break;	
	case 61:
		$htm_file='1Ti.htm';
		$book_id=5;
		break;	
	case 54:
		$htm_file='2Co.htm';
		$book_id=6;
		break;	
	case 49:
		$htm_file='2Jn.htm';
		$book_id=7;
		break;	
	case 47:
		$htm_file='2Pe.htm';
		$book_id=8;
		break;	
	case 60:
		$htm_file='2The.htm';
		$book_id=9;
		break;	
	case 62:
		$htm_file='2Ti.htm';
		$book_id=10;
		break;	
	case 50:
		$htm_file='3Jn.htm';
		$book_id=11;
		break;	
	case 44:
		$htm_file='Ac.htm';
		$book_id=12;
		break;	
	case 58:
		$htm_file='Col.htm';
		$book_id=13;
		break;	
	case 56:
		$htm_file='Eph.htm';
		$book_id=14;
		break;	
	case 55:
		$htm_file='Ga.htm';
		$book_id=15;
		break;
	case 45:
		$htm_file='Ja.htm';
		$book_id=16;
		break;	
	case 43:
		$htm_file='Jn.htm';
		$book_id=17;
		break;	
	case 65:
		$htm_file='Jud.htm';
		$book_id=18;
		break;
	case 42:
		$htm_file='Lk.htm';
		$book_id=19;
		break;
	case 41:
		$htm_file='Mk.htm';
		$book_id=20;
		break;
	case 40:
		$htm_file='Mt.htm';
		$book_id=21;
		break;
	case 57:
		$htm_file='Phl.htm';
		$book_id=22;
		break;
	case 52:
		$htm_file='Ro.htm';
		$book_id=23;
		break;	
	case 63:
		$htm_file='Tit.htm';
		$book_id=24;
		break;
	default: 
		$id_book='-1';
		break;
		}
	if ($id_book!='-1') {
	echo '<div id=avtor>'.$id_interpr.'</div><h2>Феофилакта Болгарского <br>выберите стих</h2>';	 
	}
	else echo '-1';
    break;
case 1:
	echo '<div id=avtor>'.$id_interpr.'</div>';
    break;
case 2:
	echo '<div id=avtor>'.$id_interpr.'</div>';
    break;
default:
	echo '<div id=avtor>'.$id_interpr.'</div>';
	break;
}
?>
