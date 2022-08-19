<?php
$title = get_field('product-title');
?>
<section class="products pt-[60px] lg:flex lg:justify-end">
    <div class="container mx-auto xl:mx-0     px-5">
        <h2 data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000"
            class="text-[28px] lg:text-[46px] lg:leading-[65px] uppercase leading-[42px] font-heading">
            <?= $title; ?>
        </h2>
        <div class="flex flex-col mt-[35px] lg:mt-[60px] gap-3 sm:gap-[30px] max-w-[1120px]">
            <?php 
            
            if( have_rows('products') ):
                while( have_rows('products') ) : the_row();
                    $count_text = get_sub_field('product-count-text');
                    $product_name = get_sub_field('product-name');
                    $product_desc = get_sub_field('product-desc');
                    $product_img = get_sub_field('product-img');
                    ?>
            <div class=" item flex flex-col lg:flex-row-reverse lg:justify-end">
                <div class="lg:w-[555px] bg-[#EFEFEF] flex flex-col justify-end items-end ">
                    <img class="lg:translate-y-[50px] lg:translate-x-[-40px]" src="<?= $product_img['url']; ?>"
                        alt="<?= $product_img['title'] ?>">
                    <div class="text-[18px] leading-[27px] text-white font-bold bg-acentYellow py-[13px] pl-[63px]
                        w-[240px] ">
                        <?= $count_text ?>
                    </div>
                </div>
                <div class="flex flex-col bg-second lg:w-[555px]">
                    <div class="p-[35px] lg:p-[45px]">
                        <div
                            class="text-[20px] lg:text-[30px] lg:leading-[42px] text-white leading-[28px] mb-4 font-semibold">
                            <?= $product_name; ?>
                        </div>
                        <div class="text-[12px] lg:text-[18px] lg:leading-[29px] font-normal text-white leading-5">
                            <?= $product_desc ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; endif; ?>
            <div class="flex justify-end">
                <?php do_action('button_shop'); ?>
            </div>
        </div>
    </div>
</section>
