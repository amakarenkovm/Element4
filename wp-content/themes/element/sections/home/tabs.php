<?php
$title = get_field('tab-title');
$desc = get_field('tab-desc');
?>
<section
    class="tabs bg-cover bg-[url('/wp-content/themes/element/assets/img/bg-tabs.png')] lg:flex  lg:justify-end 2xl:overflow-visible">
    <div class="container mx-auto xl:mx-0 px-3 lg:px-[35px]">
        <div class="flex relative xl:items-center xl:space-x-10 ">
            <div class="pb-[400px] sm:pb-[300px] xl:pb-[30px] w-full flex flex-col items-center xl:w-auto">
                <div class="top pt-5 sm:pt-[40px] xl:self-start">
                    <h2
                        class="uppercase text-white text-[48px] sm:text-[80px] leading-[72px] sm:leading-[120px] font-medium font-heading">
                        <?= $title; ?>
                    </h2>
                    <div class=" text-white text-[12px] sm:text-[20px] leading-5 sm:leading-[30px]">
                        <?= $desc; ?>
                    </div>
                </div>
                <div
                    class="translate-y-[400px] sm:translate-y-[150px] xl:translate-y-[0px] xl:pt-[40px] w-full sm:w-[515px] z-10">
                    <?php 
            
            if( have_rows('tabs') ):
                while( have_rows('tabs') ) : the_row();
                    $content = get_sub_field('tabs-content');?>
                    <div
                        class="text-white text-[12px] sm:text-[18px] sm:leading-7 leading-5 bg-acentYellow w-full p-6 mb-[9px] sm:mb-[25px]">
                        <?= $content;?>
                    </div>
                    <?php endwhile;
					endif;?>
                </div>
            </div>
            <div
                class="flex gap-4 absolute xl:relative justify-center w-full xl:w-auto top-[150px] xl:top-0 sm:top-[240px] 2xl:translate-y-[-50px]">
                <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2500" class="img">
                    <img class="w-[165px] sm:w-[228px] 2xl:w-[300px] h-[345px]  sm:h-[740px] 2xl:h-[850px]"
                        src="<?php echo get_template_directory_uri() ?>/assets/img/tab-1.png" alt="Element4">
                </div>
                <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2500" class="img">
                    <img class="w-[165px] sm:w-[228px] 2xl:w-[300px]  h-[345px] sm:h-[740px] 2xl:h-[850px]"
                        src="<?php echo get_template_directory_uri() ?>/assets/img/tab-2.png" alt="Element4">
                </div>
                <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2500" class="img">
                    <img class="w-[165px] sm:w-[228px] 2xl:w-[300px] h-[345px]  sm:h-[740px] 2xl:h-[850px]"
                        src="<?php echo get_template_directory_uri() ?>/assets/img/tab-3.png" alt="Element4">
                </div>
            </div>
        </div>
    </div>
</section>
