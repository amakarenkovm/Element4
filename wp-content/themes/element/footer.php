<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package element
 */

?>
<footer>
    <div class="bg-[#19181D] xl:flex xl:justify-end">
        <div class="container mx-auto xl:mx-0 px-5 py-[90px] ">
            <div class="text-[20px] leading-[28px] uppercase text-white font-medium mb-[40px] sm:mb-[44px]">
                КОНТАКТЫ
            </div>
            <div class="flex flex-col sm:flex-row sm:justify-between xl:max-w-[1000px]">
                <div>
                    <div
                        class="text-[26px] sm:text-[34px] leading-[37px] sm:leading-[48px] font-medium underline text-white mb-[30px] sm:mb-[38px]">
                        <a href="mailto:element4@gmail.com">Element4@gmail.com</a>
                    </div>
                    <div
                        class="text-[26px] sm:text-[34px] leading-[37px] sm:leading-[48px] font-medium  text-white mb-[37px] sm:mb-[85px]">
                        <a href="tel:+3809379992">+3809379992</a>
                    </div>
                    <div
                        class="mb-[40px] sm:mb-[48px] text-[26px] sm:text-[34px]  leading-[37px] sm:leading-[48px] font-medium text-white">
                        г.Киев<br>
                        ул. Киевская дом 2, кв 13
                    </div>
                </div>

                <div>
                    <div
                        class="mb-[20px] sm:mb-[30px] text-[16px] sm:text-[20px] leading-[26px] sm:leading-[32px] font-medium text-white">
                        Следите за нами<br> в социальных сетях
                    </div>
                    <ul class="flex gap-[35px]">
                        <li>
                            <a href="">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/instagram.svg"
                                    alt="Instagram">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/facebook.svg"
                                    alt="Facebook">
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div
        class="container mx-auto xl:mx-0 flex flex-col xl:justify-evenly items-center justify-center mb-[15px] sm:mb-[22px] lg:flex-row lg:justify-start">
        <div class="mb-[35px] mt-[27px] lg:mr-[50px]">
            <a href="/">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt="Element4"
                    class="header__logo-img">
            </a>
        </div>
        <div>
            <?php bem_menu('footer-ru', 'footer-nav'); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>
