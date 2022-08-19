<?php 
$title = get_field('about-title');
$text = get_field('about-text');
?>
<section data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="50" data-aos-duration="1000"
    data-aos-easing="ease-in-out" class="about">
    <div class=" pt-[60px] sm:px-0 px-[15px] w-full ">
        <div class="flex flex-col sm:flex-row-reverse relative sm:pb-0 pb-20 ">
            <div class="sm:pl-[30px] ">
                <div class=" sm:w-4/5 2xl:w-1/2">
                    <h1
                        class="text-[28px] sm:text-[30px] tracking-[0.03em] lg:text-[40px] leading-[42px] sm:leading-[45px] lg:leading-[66px] uppercase font-medium font-heading">
                        <?= $title; ?>
                    </h1>
                    <div
                        class="text-[12px] sm:text-[14px] lg:text-[18px] sm:font-light lg:leading-[29px] leading-[20px]">
                        <?= $text; ?>
                    </div>
                    <div
                        class="sm:relative  absolute sm:text-left text-center text-acentYellow bottom-0 sm:pt-5 xl:font-medium font-semibold text-[20px] xl:text-[30px] xl:leading-[42px] leading-[28px]">
                        Разжигать огонь с Element4 — настоящее удовольствие!
                    </div>
                </div>
            </div>
            <div class="about-img h-full lg:flex lg:flex-[1_1_83%] 2xl:flex-[1_1_40%] sm:pt-20 md:pt-0 pt-4">
                <img class="w-full" src="<?php echo get_template_directory_uri() ?>/assets/img/about.png"
                    alt="Element4">
            </div>

        </div>
    </div>
</section>
