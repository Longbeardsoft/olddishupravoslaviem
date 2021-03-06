<?php
get_header();
?>
			<?php get_sidebar('top'); ?>
			<?php
			if (have_posts()) {
				/* Display navigation to next/previous posts when applicable */
				if (theme_get_option('theme_top_single_navigation')) {
					theme_post_navigation(
							array(
//								'prev_link' => theme_get_previous_post_link('&laquo; %link'),
								'prev_link' => theme_get_previous_post_link( '&laquo; %link', '%title', 1, 'zhitiya' ),
								//'next_link' => theme_get_next_post_link('%link &raquo;')
								'next_link' => theme_get_next_post_link( '%link &raquo;', '%title', 1, 'zhitiya' )
								)
					);
				}
				while (have_posts()) {
					the_post();
					get_template_part('content', 'single');
				}
				/* Display navigation to next/previous posts when applicable */
				if (theme_get_option('theme_bottom_single_navigation')) {
					theme_post_navigation(
							array(
								'prev_link' => theme_get_previous_post_link('&laquo; %link'),
								'next_link' => theme_get_next_post_link('%link &raquo;')
							)
					);
				}
			} else {
				theme_404_content();
			}
			?>
			<?php get_sidebar('bottom'); ?>
<?php get_footer(); ?>
