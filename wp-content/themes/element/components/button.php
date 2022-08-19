<?php
add_action('button_shop', 'add_button_shop');
function add_button_shop()
{?>
<a data-aos="zoom-in" data-aos-duration="1500" href="/shop"
    class="banner__btn relative flex items-center justify-center xl:w-56 xl:h-56 sm:w-[150px] sm:h-[150px] w-[100px] h-[100px] bg-acentYellow rounded-full ">
    <div class="text-white  xl:text-xl  sm:text-[16px] text-[12px] uppercase font-heading">Перейти </br>в каталог</div>
    <div
        class="arrow-catalog absolute xl:left-11 md:left-[30px] sm:left-[40px] left-[25px]  xl:bottom-14 sm:bottom-[30px] bottom-[15px] ">
        <img src="<?php echo get_template_directory_uri() ?>/assets/img/arrow-catalog.svg" alt="arrow-shop">
    </div>
</a>
<?php }
