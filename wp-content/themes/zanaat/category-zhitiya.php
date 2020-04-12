<?php
/**
* A Simple Category Template
*/

get_header(); ?> // �������� ������ ������

<section id="primary" class="site-content">
<div id="content" role="main">

// ���������, ���� �� ������ ��� �����������
<?php if ( have_posts() ) : ?>

<header class="archive-header">
// � ���� ����, ��� ���� ������ ����� �������������� ������ ��� ������� Design
// �� ����� ���� ����� �������� ��������� ��������� � �� ��������.
// ��� ���� �������� ����������� ��� �������� �������� ���������.

<h1 class="archive-title">Design Articles</h1>
<div class="archive-meta">
������ � ��������� ��������� � ������� � web.
</div>
</header>

<?php

// ����
while ( have_posts() ) : the_post();?>
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>

<div class="entry">
<?php the_excerpt(); ?>

 <p class="postmetadata"><?php
  comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
?></p>
</div>

<?php endwhile; // ����� �����

else: ?>
<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>
</div>
</section>

//�������� ������� �������� � ������
<?php get_sidebar(); ?>
<?php get_footer(); ?>
