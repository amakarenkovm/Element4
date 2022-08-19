<?php get_header();?>
<section class="category">
    <div class="container mx-auto p-5 ">
        <div class="container mx-auto px-5 pt-[45px] pb-[45px] sm:pt-[60px] sm:pb-[35px] lg:pt-[45px] lg:pb-[85px]"><?php
			if ( function_exists('yoast_breadcrumb') ) {
 			 yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );}?>
        </div>
        <h1 class="mb-[25px] text-[44px] font-medium font-heading leading-[66px] uppercase"><?php the_category() ?></h1>
        <div class="flex gap-[14px] mb-[100px] ">
            <div class="slick min-w-0">

                <?php
		if( have_posts() ):
			while( have_posts() ):
				the_post();?>
                <a class="relative  group  mr-[20px]" href="<?php the_permalink() ?>">
                    <img class="object-cover h-[426px] " src="<?php the_post_thumbnail_url() ?>" alt="">
                    <div
                        class="absolute flex flex-col  justify-end p-5 bg-opacity top-0 left-0 right-0 bottom-0 w-full h-full">
                        <h3 class="text-[20px] font-semibold leading-[28px] text-white">
                            <?php the_title() ?>
                        </h3>
                        <div class="mt-[20px] text-[12px] font-normal leading-[19px] text-white">
                            <?php the_excerpt() ?>
                        </div>
                        <div
                            class=" mt-[50px] relative text-acentYellow uppercase text-[20px] leading-[30px] font-semibold font-heading before:content-[''] before:absolute before:w-[50px] before:h-[50px] before:top-[-50%] before:bg-acentYellow before:left-[120px] before:rounded-full">
                            Читать
                            <img class="absolute left-[100px] top-[3px] group-hover:animate-bounceSlow  hover:ease-in hover:duration-300  "
                                src=" <?php echo get_template_directory_uri() ?>/assets/img/arrow-catalog.svg"
                                alt="arrow-shop">
                        </div>
                    </div>
                </a>
                <?php endwhile; endif; ?>
            </div>
        </div>
    </div>

</section>

<?php get_footer(); ?>
