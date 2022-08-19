<?php
/*
Template Name: Contact
*/
?>

<?php get_header()?>
<div class="container mx-auto px-5 pt-[45px] pb-[45px] sm:pt-[60px] sm:pb-[35px] lg:pt-[45px] lg:pb-[85px]"><?php
if ( function_exists('yoast_breadcrumb') ) {
  yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
}
?></div>
<?php

while ( have_posts() ) :
    the_post();

    get_template_part( 'template-parts/content', 'contact' );

endwhile;
?>
<?php get_footer('contact')?>
