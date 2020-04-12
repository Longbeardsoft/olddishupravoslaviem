<?php
//header('Content-Type: text/html; charset=windows-1251');
get_header();
?>
			<?php get_sidebar('top'); ?>
			<?php
			if (have_posts()) {
				// Display navigation to next/previous posts when applicable 
				if (theme_get_option('theme_top_single_navigation')) {
					theme_post_navigation(
							array(
								//'prev_link' => theme_get_previous_post_link('&laquo; %link'),
								'prev_link' => theme_get_previous_post_link( '%link', '< %title', 1 ),
								//'next_link' => theme_get_next_post_link('%link &raquo;'),
								'next_link' => theme_get_next_post_link( '%link', '%title >', 1 )
							)
					);
				echo '<a href=http://dishupravoslaviem.ru/zhitiya-svyatyx/>'.iconv("windows-1251","UTF-8","Оглавление").'</a>';
				}
				while (have_posts()) {
					the_post();
					get_template_part('content', 'single');
				}
				// Display navigation to next/previous posts when applicable 
				if (theme_get_option('theme_bottom_single_navigation')) {
					theme_post_navigation(
							array(
								//'prev_link' => theme_get_previous_post_link('&laquo; %link'),
								'prev_link' => theme_get_previous_post_link( '%link', '< %title', 1 ),
								//'next_link' => theme_get_next_post_link('%link &raquo;'),
								'next_link' => theme_get_next_post_link( '%link', '%title >', 1 )
							)
					);
				echo '<a href=http://dishupravoslaviem.ru/zhitiya-svyatyx/>'.iconv("windows-1251","UTF-8","Оглавление").'</a>';
				}
			} else {
				theme_404_content();
			}
			?>
			<?php get_sidebar('bottom'); ?>
<?php get_footer(); ?>