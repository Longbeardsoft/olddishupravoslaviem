<?php
/**
* A Simple Category Template
*/

get_header(); ?> // выбираем шаблон хидера

<section id="primary" class="site-content">
<div id="content" role="main">

// проверяем, есть ли записи для отображения
<?php if ( have_posts() ) : ?>

<header class="archive-header">
// В виду того, что этот шаблон будет использоваться только для рубрики Design
// мы можем прям здесь добавить заголовок категории и ее описание.
// или даже добавить изображение или изменить страницу полностью.

<h1 class="archive-title">Design Articles</h1>
<div class="archive-meta">
Статьи и обучающие материалы о дизайне и web.
</div>
</header>

<?php

// Цикл
while ( have_posts() ) : the_post();?>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

<div class="entry">
<?php the_excerpt(); ?>

 <p class="postmetadata"><?php
  comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
?></p>
</div>

<?php endwhile; // Конец цикла

else: ?>
<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
</div>
</section>

//выбираем шаблоны сайдбара и футера
<?php get_sidebar(); ?>
<?php get_footer(); ?>
