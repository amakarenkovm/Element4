<?php 
$text1 = get_field('banner-text-1');
$text2 = get_field('banner-text-2');
$text3 = get_field('banner-text-3');

?>
<section class="baner">
    <div class="banner__inner container mx-auto xl:pt-20 pt-[30px]">
        <div class="banner-text flex items-center  mx-auto sm:w-9/12 w-full px-[10px] sm:px-0 relative pt-6">
            <div class="translate-y-11">
                <?php do_action('button_shop'); ?>
            </div>
            <div class="flex flex-col">
                <div data-aos="fade-right" data-aos-duration="1500"
                    class="banner__text text-acetDark absolute xl:-top-6 top-[25px] left-10 xl:text-8xl sm:text-5xl text-[32px]  font-heading block  uppercase font-medium">
                    <?= $text1; ?>
                </div>
                <div data-aos="fade-left" data-aos-duration="1500"
                    class="banner__text text-acetDark absolute xl:top-1/2 top-[60%] xl:left-72 sm:left-[170px] left-[120px] sm:w-4/5  xl:text-8xl  sm:text-5xl text-[28px]  font-heading mb-5 block  uppercase font-medium">
                    <?= $text2; ?>
                </div>
                <div data-aos="fade-right" data-aos-duration="1500"
                    class="banner__text text-acentYellow absolute xl:-bottom-24 sm:bottom-[-60px] bottom-[-50px]  xl:left-52 sm:left-[145px] left-[140px] xl:text-8xl  sm:text-5xl text-[32px]  font-heading block  uppercase font-medium">
                    <?= $text3; ?>
                </div>
            </div>
        </div>

    </div>
    <div class="banne__img">
        <img class="object-contain w-full" src="<?php echo get_template_directory_uri() ?>/assets/img/banner.png"
            alt="arrow-shop">
    </div>
</section>
