<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<!-- Start loop -->
<div class="flex flex-col lg:flex-row items-start md:items-center justify-between  mt-5 gap-[35px]">

    <div>
        <span class="text-[#5757574D] pb-[10px]">
            <?= __('Цена:', 'woocommerce') ?>
        </span>

        <div
            class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> text-[24px] leading-[29px] font-semibold">
            <?php echo $product->get_price_html(); ?></div>
    </div>
    <!-- End loop  -->
