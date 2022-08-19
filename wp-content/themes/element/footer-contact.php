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

    <div class="container mx-auto xl:px-5 flex flex-col  items-center mb-[15px] sm:mb-[22px] lg:flex-row ">
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
