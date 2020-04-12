<?php
/**
 * Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Deep_Breath
 * @since Deep Breath 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<nav id="nav-single">
						<h3 class="assistive-text"><?php _e( 'Post navigation', 'deepbreath' ); ?></h3>
						<span class="author-text"><?php echo ' Автор ';echo '<a href="">';the_author();echo '</a>'; ?></span><br>
						
						<span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span> %title', 'deepbreath' ) ); ?></span>
						<span class="nav-next"><?php next_post_link( '%link', __( '%title <span class="meta-nav">&rarr;</span>', 'deepbreath' ) ); ?></span>
					</nav><!-- #nav-single -->

					<?php get_template_part( 'content-single', get_post_format() ); ?>

					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
			<?php $sidebar = get_post_meta($post->ID, "secondary", true);
get_sidebar($sidebar);
?>

<?php get_footer(); ?>
