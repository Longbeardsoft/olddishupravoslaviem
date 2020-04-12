<style>
@media screen and (max-width: 980px) {
   #text {
      font-size:0.6em;
	  
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
	  color:black;
   }
   a{
   text-decoration:none;
   margin: 0 7px;
   word-wrap: break-word;
   hyphens: auto; 
   -ms-hyphens: auto; 
	-moz-hyphens: auto; 
	-webkit-hyphens: auto; 
   }
   #interpr h2{
   text-align:center;
   }
   h1{
   text-align:center;
   }
   #interpr {
   text-align:justify;
   }
</style>
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->
<head>
</head>
<body>
<?php
if ( have_posts() ) : // если имеются записи в блоге.
  query_posts('cat=1166');   // указываем ID рубрик, которые необходимо вывести.
  while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
?>
<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
<?php the_content();
  endwhile;  // завершаем цикл.
endif;
/* Сбрасываем настройки цикла. Если ниже по коду будет идти еще один цикл, чтобы не было сбоя. */
wp_reset_query();                
?>
</body>