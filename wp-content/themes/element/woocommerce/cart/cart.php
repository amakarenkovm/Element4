<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="flex flex-col md:flex-row gap-[15px] sm:gap-[35px] lg:gap-[55px]">
    <div>
        <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            <?php do_action( 'woocommerce_before_cart_table' ); ?>

            <?php do_action( 'woocommerce_before_cart_contents' ); ?>

            <?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

		if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) :
			$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key ); ?>
            <div class="mb-[15px] sm:mb-[30px] bg-white p-[20px] sm:p-[35px] w-full flex items-start gap-5">
                <div
                    class="w-[75px] h-[60px] sm:w-[109px] sm:h-[87px] lg:w-[204px] lg:h-[145px] bg-[#FDFDFD] flex items-center justify-center ">
                    <?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>
                </div>
                <div class="flex-col flex gap-[35px] sm:gap-[55px]">
                    <div class="flex">
                        <div class="text-[14px] sm:text-[18px] font-semibold sm:max-w-[317px] sm:w-[317px]">
                            <?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}
						?>
                        </div>
                        <div>
                            <div>
                                <div class="text-acentYellow text-[16px] sm:text-[20px]">
                                    <?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok. ?>
                                </div>
                               <div class="flex quantity justify-center gap-[10px] items-center">
								<div class="plus qty-btn text-[25px] cursor-pointer">+</div>
							   <div class="product-quantity w-[70px] h-[30px] border-[1px] border-[#E5E5E5] rounded-[5px] flex justify-center items-center"
                                    data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
                                    <?php
						if ( $_product->is_sold_individually() ) {
							$product_quantity = sprintf( '%s<input class="input-text" type="hidden" name="cart[%s][qty]" value="%s" />', $cart_item['quantity'],$cart_item_key,  $cart_item['quantity']  );
						} 

						echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
						?>
                                </div>
								<div class="minus qty-btn text-[25px] cursor-pointer">-</div>
							   </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php
								echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
									'woocommerce_cart_item_remove_link',
									sprintf(
										'<a href="%s" class="remove ml-[40px] text-[#F44336] underline text-[12px] relative " aria-label="%s" data-product_id="%s" data-product_sku="%s"> Удалить</a>',
										esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'woocommerce' ),
										esc_attr( $product_id ),
										esc_attr( $_product->get_sku() )
									),
									$cart_item_key
								);
							?>
                    </div>
                </div>
            </div>

            <?php endif;?>
            <?php endforeach; ?>

        </form>
    </div>
    <div class="bg-white px-5 py-[35px] h-full">
        <h3 class="text-acentYellow text-[20px] lg:text-[30px] mb-[30px]">
            Ваш заказ
        </h3>
        <div class="flex flex-col border-b-[1px] border-[#E5E5E5] overflow-x-scroll max-h-[150px]">
            <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key ); ?>
            <div class="mb-[20px] sm:mb-[32px] text-[12px] sm:text-[18px] max-w-[255px] sm:max-w-[265px]">
                <?php
						if ( ! $product_permalink ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
						} else {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
						}

						do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

						// Meta data.
						echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

						// Backorder notification.
						if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
							echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
						}
						?>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="mt-[10px] sm:mt-[30px] flex justify-between">
            <div>
                <?php echo WC()->cart->get_cart_contents_count() ?> товара
            </div>
            <div>
                <?php wc_cart_totals_order_total_html(); ?>
            </div>
        </div>
        <div
            class="mt-[40px] text-white text-[18px] justify-center flex items-center w-full sm:w-[265px] py-[10px] bg-acentYellow rounded-full">
            <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
        </div>

    </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>