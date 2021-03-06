<?php
/**
 * The template for displaying Front Page
 *
 * @package dahtheme-child
 */

get_header();

	while ( have_posts() ) :
		the_post();

		do_action( 'page_before' );

		get_template_part( 'template-parts/content', 'page' );

		do_action( 'page_after' );

	endwhile; // End of the loop.
			
get_footer();