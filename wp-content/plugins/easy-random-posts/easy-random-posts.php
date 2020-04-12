<?php
/*
Plugin Name: Easy Random Posts
Plugin URI: http://thisismyurl.com/downloads/easy-random-posts/
Description: An easy to use WordPress function to add Random Posts to any theme.
Author: Christopher Ross
Author URI: http://thisismyurl.com/
Tags: future, upcoming posts, upcoming post, upcoming, draft, Post, random, preview, plugin, post, posts
Version: 15.01
*/


/**
 *
 * Easy Random Posts core file
 *
 * This file contains all the logic required for the plugin
 *
 * @link		http://wordpress.org/extend/plugins/wordpresscom-stats-smiley-remover/
 *
 * @package 	Easy Random Posts
 * @copyright	Copyright (c) 2008, Chrsitopher Ross
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * @since 		Easy Random Posts 1.0
 *
 *
 */

/* if the plugin is called directly, die */
if ( ! defined( 'WPINC' ) )
	die;
	
	
define( 'THISISMYURL_ERP_NAME', 'Easy Random Posts' );
define( 'THISISMYURL_ERP_SHORTNAME', 'Easy Random Posts' );

define( 'THISISMYURL_ERP_FILENAME', plugin_basename( __FILE__ ) );
define( 'THISISMYURL_ERP_FILEPATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'THISISMYURL_ERP_FILEPATHURL', plugin_dir_url( __FILE__ ) );

define( 'THISISMYURL_ERP_NAMESPACE', basename( THISISMYURL_ERP_FILENAME, '.php' ) );
define( 'THISISMYURL_ERP_TEXTDOMAIN', str_replace( '-', '_', THISISMYURL_ERP_NAMESPACE ) );

define( 'THISISMYURL_ERP_VERSION', '15.01' );

include_once( 'thisismyurl-common.php' );

/**
 * Creates the class required for Easy Random Posts
 *
 * @author     Christopher Ross <info@thisismyurl.com>
 * @version    Release: @15.01@
 * @see        wp_enqueue_scripts()
 * @since      Class available since Release 14.11
 *
 */
if( ! class_exists( 'thissimyurl_EasyRandomPosts' ) ) {
class thissimyurl_EasyRandomPosts extends thisismyurl_Common_ERP {
	/**
	  * Standard Constructor
	  *
	  * @access public
	  * @static
	  * @uses http://codex.wordpress.org/Function_Reference/add_shortcode
	  * @since Method available since Release 15.01
	  *
	  */
	public function run() {
		
		add_action( 'widgets_init', array( $this, 'widget_init' ) );
		
		add_shortcode( 'thisismyurl_easy_random_posts', array( $this, 'easy_random_posts_shortcode' ) );
		
	}
	
	
	
	/**
	  * easy_random_posts_shortcode helper function
	  *
	  * @access public
	  * @static
	  * @since Method available since Release 14.11
	  *
	  */
	 function easy_random_posts_shortcode() {
	
		$random_posts = $this->easy_random_posts();
		
		if ( ! empty( $random_posts ) )
			echo '<ul class="thisismyurl-easy-random-posts">' . $random_posts . '</ul>';
			
	} 
	
	
	
	/**
	  * easy_random_posts
	  *
	  * @access public
	  * @static
	  * @since Method available since Release 14.11
	  *
	  */
	function easy_random_posts( $options = NULL ) {

		$options = wp_parse_args( $options, $this->random_posts_defaults() );
		
		$args = array( 'numberposts' => $options['post_count'], 'orderby' => 'rand' );
		$random_posts = get_posts( $args );
		
		if( ! empty( $random_posts ) ) {
			foreach ( $random_posts as $random_post ) {
	
				/* place the post title */
				$random_item = sprintf( '<span class="title">%s</span>', esc_html( get_the_title( $random_post->ID ) ) );
				
				
				/* if there's a link, display it */
				if ( $options['include_link'] == 1 ) {
				
					if( $options['nofollow'] == 1 )
						$nofollow = 'nofollow';
					else
						$nofollow = '';
						
					$random_item = sprintf( '<span class="title-link"><a href="%s" title="%s" %s >%s</a><span>',
											get_permalink( $random_post->ID ),
											esc_attr( get_the_title( $random_post->ID ) ),
											$nofollow,
											$random_item
									);	
					
				}
				
				
				/* feature image, if there is one */
				if ( $options['feature_image'] == 1 && has_post_thumbnail( $random_post->ID ) ) {
					$random_item = sprintf( '<div class="thumbnail">%s</div>%s', 
											get_the_post_thumbnail($thepost->ID,'thumbnail'),
											$random_item
											);
				}
				
				
				/* show the excerpt when it's required */
				if ( $options['show_excerpt'] == 1 && ! empty( $random_post->post_excerpt ) ) {
					
					$random_item = sprintf( '%s<div class="excerpt">%s</div>', 
											$random_item,
											esc_html( $random_post->post_excerpt )
											);
				}
				
	
				/* wrap the content in the proper tags */
				$random[] =  $options['before'] . $random_item . $options['after'];
		
			}
	
		}
		
		/* return in the proper format */
		if ( ! empty( $random ) ) {
			if ( $options['show'] == 1 )
				echo implode( '', $random );
			else
				return implode( '', $random );
		
		}
	
	}
	
	/**
	  * random_posts_defaults sets defaults for plugin
	  *
	  * @access public
	  * @static
	  * @since Method available since Release 14.11
	  *
	  */	 
	function random_posts_defaults() {
	
		$default_options = array(
									'title'     	=> __( 'Easy Random Posts', THISISMYURL_ERP_NAME ),
									'post_count'    => 10,
									'order'    		=> 'rand',
									'include_link' 	=> 1,
									'before'   		=> '<li>',
									'after'    		=> '</li>',
									'nofollow' 		=> 0,
									'show_excerpt' 	=> 0,
									'feature_image' => 0,
									'show_credit' 	=> 1,
									'show'     		=> 0,
									
								);
								
		return $default_options;						
								
	}
	
	
	
	/**
	  * widget_init activates the plugin widgets
	  *
	  * @access public
	  * @static
	  * @uses register_widget
	  * @since Method available since Release 15.01
	  *
	  */
	function widget_init() {
		
		include_once( 'widgets/thissimyurl_EasyRandomPosts_Widget.php' );
		register_widget( 'thissimyurl_EasyRandomPosts_Widget' );
	
	}

	  
	
}
}

global $thissimyurl_EasyRandomPosts;

$thissimyurl_EasyRandomPosts = new thissimyurl_EasyRandomPosts;

$thissimyurl_EasyRandomPosts->run();




/**
  * Allows theme authors to call 
  *
  * @access public
  * @static
  * @uses $thissimyurl_EasyRandomPosts->easy_random_posts
  * @since Method available since Release 15.01
  *
  * @param  array see $thissimyurl_EasyRandomPosts->random_posts_defaults() for accepted options
  *
  */
if ( ! function_exists( 'thisismyurl_easy_random_posts' ) ) {
function thisismyurl_easy_random_posts( $options = NULL ) {
	
	$thissimyurl_EasyRandomPosts->easy_random_posts( $options );

}
}