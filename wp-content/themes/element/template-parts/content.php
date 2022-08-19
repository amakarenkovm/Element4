<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package element
 */

?>
<section class="single-post pb-[100px]">
    <div class="container mx-auto px-5">
        <h1 class=" uppercase text-[20px] lg:text-[30px] leading-[28px] lg:tex-[42px] mb-[15px] lg:mb-[45px]">
            <?php the_title(); ?>
        </h1>
        <div class="flex justify-center mb-[40px]">
            <img class="w-[324px] h-[217px] sm:w-full sm:h-full object-cover" src="<?php the_post_thumbnail_url()  ?>"
                alt="">
        </div>
        <div class=" mx-auto justify-center prose max-w-7xl	 ">
            <?php the_content(); ?>
        </div>
    </div>
</section>
