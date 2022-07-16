<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dhor
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			$enable_post_nav = dhor_get_option( 'enable_post_nav' );
			if( $enable_post_nav === true  ) {
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-arrow">&larr;</span> <span class="nav-subtitle">' . esc_html__( 'Previous Post', 'dhor' ) . '</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next Post', 'dhor' ) . '</span> <span class="nav-arrow">&rarr;</span>',
					)
				);
			}

			$show_related_posts = dhor_get_option( 'show_related_posts' );
			if( $show_related_posts === true  ) {
				get_template_part( 'template-parts/content', 'related-posts' );
			}

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
