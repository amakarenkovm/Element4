<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package element
 */

get_header();
?>
<div class="container mx-auto px-5 pt-[45px] pb-[45px] sm:pt-[60px] sm:pb-[35px] lg:pt-[45px] lg:pb-[85px]"><?php
			if ( function_exists('yoast_breadcrumb') ) {
 			 yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );}?>
</div>
<main id="primary" class="site-main">

    <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

</main><!-- #main -->

<?php

get_footer();
