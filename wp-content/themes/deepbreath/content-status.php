<?php
/**
 * Template for displaying posts in the Status Post Format
 *
 * Used on index and archive pages
 *
 * @link https://codex.wordpress.org/Post_Formats
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
				<h3 class="entry-format"><?php _e( 'Status', 'deepbreath' ); ?></h3>
			</hgroup>

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
			<div class="avatar">
				<?php
				/**
				 * Filter the Deep Breath status avatar size.
				 *
				 * @since Deep Breath 1.0
				 *
				 * @param int The height and width avatar dimensions in pixels. Default 65.
				 */
				echo get_avatar( get_the_author_meta( 'ID' ), apply_filters( 'deepbreath_status_avatar', 65 ) );
				?>
			</div>

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
			<?php deepbreath_posted_on(); ?>
			<?php if ( comments_open() ) : ?>
			<span class="sep"> | </span>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'deepbreath' ) . '</span>', __( '<b>1</b> Reply', 'deepbreath' ), __( '<b>%</b> Replies', 'deepbreath' ) ); ?></span>
			<?php endif; ?>
			<?php edit_post_link( __( 'Edit', 'deepbreath' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
