<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package element
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body class="font-body text-second bg-body">
    <?php wp_body_open(); ?>
    <header class="mx-auto py-5 ">
        <div class="container flex items-center w-full mx-auto">
            <div class="lg:w-1/4 flex items-center justify-between w-full px-4 flex-row-reverse lg:flex-row ">

                <div class="flex flex-row-reverse gap-[20px] items-center">
                    <div
                        class="lg:hidden  burger space-y-2 cursor-pointer z-20 bg-acentYellow rounded-full w-[50px] h-[50px] flex flex-col justify-center items-center">
                        <span class="block w-5 rounded-sm h-0.5 bg-white"></span>
                        <span class="block w-5 rounded-sm h-0.5 bg-white"></span>
                        <span class="block w-5 rounded-sm h-0.5 bg-white"></span>
                    </div>
                    <div class="header__shop lg:hidden">
                        <ul class=" justify-center flex items-center">
                            <li class="ml-4 cursor-pointer">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/search.svg"
                                    alt="search">
                            </li>
                            <li class="ml-4 cursor-pointer">
                                <a href="/cart"> <img
                                        src="<?php echo get_template_directory_uri() ?>/assets/img/cart.svg"
                                        alt="cart"></a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="header__logo w-[85px] lg:w-full ">
                    <a href="/">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.png" alt="Element4"
                            class="header__logo-img">
                    </a>
                </div>

            </div>
            <div
                class="header-menu hidden  absolute lg:relative left-0 right-0 bottom-0 top-0 h-full lg:block w-full  z-10 ">
                <div
                    class=" bg-acentYellow lg:bg-body flex justify-center lg:flex-row flex-col  w-full h-full items-center">
                    <div
                        class="lg:w-3/4 w-full header__menu font-heading flex items-center justify-center lg:justify-start  ">
                        <?php bem_menu('menu-1', 'nav'); ?>
                    </div>
                    <div class="header__shop hidden lg:flex">
                        <ul class=" justify-center flex items-center">
                            <li class="ml-4 cursor-pointer">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/img/search.svg"
                                    alt="search">
                            </li>
                            <li class="ml-4 cursor-pointer">
                                <a href="/cart"><img
                                        src="<?php echo get_template_directory_uri() ?>/assets/img/cart.svg"
                                        alt="cart"></a>
                            </li>
                            <li
                                class="ml-4 cursor-pointer rounded-max text-acentYellow border-acentYellow border px-4 py-2">
                                <ul class="lang flex items-center">
                                    <div class="lang-item text-sm mr-2">
                                        РУС
                                    </div>
                                    <div class="lang-arrow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </div>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </header>
