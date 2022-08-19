<section class="about-page mb-[50px] lg:mb-[100px]">
    <div class="container mx-auto px-5">
        <h1
            class=" mb-[50px] uppercase text-[28px] leading-[42px] sm:text-[34px] sm:leading-[48px] lg:text-[46px] lg:leading-[65px] font-heading font-medium ">
            <?php the_title()?>
        </h1>
        <div class="prose max-w-3xl mb-[50px] sm:mb-[70px] lg:-mb[100px]">
            <?php the_content() ?>
        </div>
        <?php get_template_part( 'sections/home/products' )?>

    </div>
</section>
