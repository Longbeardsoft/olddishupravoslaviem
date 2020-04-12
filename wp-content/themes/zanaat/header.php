<?php 
require_once('Mobile_Detect.php');  // Подключаем скрипт Mobile_Detect.php
$detect = new Mobile_Detect; // Инициализируем копию класса
$mobile=$detect->isMobile();
?> 
 <?php global $wp_locale;

if (isset($wp_locale)) {

	$wp_locale->text_direction = 'ltr';

} ?>

<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
<!--<link href="http://dishupravoslaviem.ru/wp-content/themes/zanaat/style.responsive.css" rel="stylesheet">-->
<link rel="icon" href="http://dishupravoslaviem.ru/wp-content/uploads/2015/03/favicon.png" type="image/x-icon" />
<link rel="shortcut icon" href="http://dishupravoslaviem.ru/wp-content/uploads/2015/03/favicon.png" type="image/x-ic" />

<meta charset="<?php bloginfo('charset') ?>" />
<meta name='yandex-verification' content='71608410ba2d9081' />
<title><?php wp_title( '|', true, 'right' ); ?></title>

<!-- verstka www.zanaat.ru -->

<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width" />
<meta name="google-site-verification" content="unvmtkA5oe292Wbsk5atToHHIASr3_BgzafcqUyDmPM" />
<meta name="google-site-verification" content="Uws1Zb0_WSuZ5ORnxLJUOKiOyneWtbSJAN4hHOMz7JE" />

<!--[if lt IE 9]><script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->



<link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>" media="screen" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->

<?php

remove_action('wp_head', 'wp_generator');

if (is_singular() && get_option('thread_comments')) {

	wp_enqueue_script('comment-reply');

}

wp_head();

?>

</head>

<body <?php body_class(); ?>>

<?php //проблема с admin-ajax.php 
add_action( 'init', 'my_deregister_heartbeat', 1 );
function my_deregister_heartbeat() {
	global $pagenow;

	if ( 'post.php' != $pagenow && 'post-new.php' != $pagenow )
		wp_deregister_script('heartbeat');
}
//конец
?>
<div id="mbar"><span>Сайту требуется оплата, собираем посильную помощь</span> <a href="http://dishupravoslaviem.ru/pozhertvovat/" target="_blank"><span class="mbar-button">ПОЖЕРТВОВАТЬ</span></a></div>
<div id="inputmain">
<?php if(theme_has_layout_part("header")&&(!$mobile)) : ?>

<!-- Начало шапка -->
<a href="http://dishupravoslaviem.ru/"><img width="100%" src="http://dishupravoslaviem.ru/wp-content/uploads/2015/03/33__33__33.jpg" alt="Дышу Православием" title="Дышу Православием"/></a>
<?php endif; ?>



<?php if (theme_get_option('theme_use_default_menu')) { wp_nav_menu( array('theme_location' => 'primary-menu') );} else { ?>
<div class='topNav'>
    <nav class="inputnav">

    <div class="inputnav-inner">

    <?php

	echo theme_get_menu(array(

			'source' => theme_get_option('theme_menu_source'),

			'depth' => theme_get_option('theme_menu_depth'),

			'menu' => 'primary-menu',

			'class' => 'inputhmenu'

		)

	);

	get_sidebar('nav'); 

?> 

        </div>

    </nav>
<!-- Начало Поиск -->
<div class='searchform'>
<form class="inputsearch" method="get" name="searchform" action="http://dishupravoslaviem.ru/">

<input name="s" value="" type="text">

<input class="inputsearch-button" value="" type="submit">

</form>
</div>
    
</div><!-- end of topNav -->
    <?php } ?>


<div class='clearfix'></div>

<div class="inputsheet clearfix">

            <div class="inputlayout-wrapper">

                <div class="inputcontent-layout">

                    <div class="inputcontent-layout-row">

<?php 
//Определение мобильника
function pda(){
  $pda_patterns = array(
    'MIDP','FLY-','MMP','Mobile','MOT-',
    'Nokia','Obigo','Panasonic','PPC',
    'ReqwirelessWeb','Samsung','SEC-SGH',
    'Smartphone','SonyEricsson','Symbian',
    'WAP Browser','j2me','BREW', 'iPod', 'iPhone'
  );
  $agent = $_SERVER['HTTP_USER_AGENT'];
  $user_agent = strtolower($agent);
  foreach($pda_patterns as $val){
    $val = strtolower($val);
    if(strpos($user_agent, $val) !== false){ return true; }
  }
  return false;
} 
// Любое мобильное устройство (телефоны или планшеты).
if ($mobile) {
//echo '+++++';
} else { //echo "------";
get_sidebar(); 
}
?>

                        <div class="inputlayout-cell inputcontent">
<meta name='yandex-verification' content='71608410ba2d9081' />
