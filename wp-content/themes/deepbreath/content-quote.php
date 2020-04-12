<?php
/**
 * Template for displaying content
 *
 * @package WordPress
 * @subpackage Deep_Breath
 * @since Deep Breath 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<hgroup>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Quote', 'deepbreath' ); ?></h3>
			</hgroup>

			<div class="entry-meta">
				<?php deepbreath_posted_on(); ?>
			</div><!-- .entry-meta -->

			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'deepbreath' ) . '</span>', _x( '1', 'comments number', 'deepbreath' ), _x( '%', 'comments number', 'deepbreath' ) ); ?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'deepbreath' ) ); ?>
			<?php
			wp_link_pages(
				array(
					'before' => '<div class="page-link"><span>' . __( 'Pages:', 'deepbreath' ) . '</span>',
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php $show_sep = false; ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'deepbreath' ) );
			if ( $categories_list ) :
				?>
			<span class="cat-links">
				<?php
				printf( __( '<span class="%1$s">Posted in</span> %2$s', 'deepbreath' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true;
				?>
			</span>
			<?php endif; // End if categories ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'deepbreath' ) );
			if ( $tags_list ) :
				if ( $show_sep ) :
					?>
			<span class="sep"> | </span>
				<?php endif; // End if $show_sep ?>
			<span class="tag-links">
				<?php
				printf( __( '<span class="%1$s">Tagged</span> %2$s', 'deepbreath' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				$show_sep = true;
				?>
			</span>
			<?php endif; // End if $tags_list ?>

			<?php if ( comments_open() ) : ?>
				<?php if ( $show_sep ) : ?>
			<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'deepbreath' ) . '</span>', __( '<b>1</b> Reply', 'deepbreath' ), __( '<b>%</b> Replies', 'deepbreath' ) ); ?></span>
			<?php endif; // End if comments_open() ?>

			<?php edit_post_link( __( 'Edit', 'deepbreath' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
