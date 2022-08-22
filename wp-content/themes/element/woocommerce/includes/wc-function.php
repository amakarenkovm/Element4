<?php
defined('ABSPATH') || exit;

// Remove sidebar
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

//Breadcrumbs container
add_action('woocommerce_before_main_content', 'element_breadrumbs_start', 15);
function element_breadrumbs_start()
{ ?>
<div class="mb-[40px] sm:mb-[30px] lg:mb-[80px] text-acentYellow">
    <?php }

add_action('woocommerce_before_main_content', 'element_breadrumbs_close', 25);
function element_breadrumbs_close()
{ ?>
</div>
<?php }
//Single wrap
// add_action('woocommerce_before_main_content', 'element_single_wrapper_open', 5);

function element_single_wrapper_open()
{ ?>
<div class="container mx-auto px-5">
    <?php }
// add_action('woocommerce_after_main_content', 'element_single_wrapper_close', 15);

function element_single_wrapper_close()
{ ?>
</div>
<?php }
// Flex thumbnail and summary
add_action('woocommerce_before_single_product_summary', 'element_flex_open', 5);
function element_flex_open()
{ ?>
<div class="flex flex-col md:flex-row mt-[25px] sm:mt-[50px] mb-[45px] lg:mb-[90px]">
    <?php }

add_action('woocommerce_single_product_summary', 'element_flex_close', 65);
function element_flex_close()
{ ?>
</div>
<?php }
// Width product img
add_action('woocommerce_before_single_product_summary', 'element_img_open', 5);

function element_img_open()
{ ?>
<div class=" flex items-center justify-center mr-[30px] flex-[0_0_35%] lg:flex-[0_0_45%] h-[527px] bg-[#F4F4F4]">
    <?php }

add_action('woocommerce_before_single_product_summary', 'element_img_close', 25);

function element_img_close()
{ ?>
</div>
<?php }


add_action('woocommerce_single_product_summary', 'stoke', 10);

function stoke()
{
    global $product;
    if ($product->stock_status == 'instock') {
        $path = get_template_directory_uri() . '/woocommerce/assets/img/done.svg';
        $img = '<img class="mr-[10px] my-5" src="%s" alt="">';
        echo '<div class=" flex items-center text-[13px] font-semibold leading-[20px] text-[#37B323]">' . sprintf($img, $path) . __('Есть в наличии', 'woocommerce') . '</div>';
    } else {
        echo '<div class="ul_quantity">' . __('Нет в наличии', 'woocommerce') . '</div>';
    }
}

add_filter('woocommerce_currency_symbol', 'change_uah_currency_symbol', 10, 2);
function change_uah_currency_symbol($currency_symbol, $currency)
{
    switch ($currency) {
        case'UAH':
            $currency_symbol = ' грн.';
            break;
    }
    return $currency_symbol;
}
function custom_remove_all_quantity_fields( $return, $product ) {return true;}
add_filter( 'woocommerce_is_sold_individually','custom_remove_all_quantity_fields', 10, 2 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 30);

// One click 
add_action('woocommerce_single_product_summary', 'element_one_click_btn', 30);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);



function element_one_click_btn()
{
    global $product;
    ?>
<form class="cart flex gap-[25px] flex-col md:flex-row w-full"
    action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
    method="post" enctype='multipart/form-data'>
    <?php do_action('woocommerce_before_add_to_cart_button'); ?>

    <a
        class="py-3 px-[34px] cursor-pointer btn-one-click text-acentYellow  flex items-center justify-center border border-acentYellow rounded-full font-semibold">
        <?= __('Купить в один клик', 'woocommerce') ?> </a>

    <button type="submit " name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>"
        class="preparat-button-buy ul-btn single_add_to_cart_button py-3 px-[34px] cursor-pointer flex items-center justify-center bg-acentYellow text-white text-[18px] leading-[29px] font-semibold rounded-full "><?php echo esc_html($product->single_add_to_cart_text()); ?></button>



    <?php do_action('woocommerce_after_add_to_cart_button'); ?>
</form>
<!-- End loop -->
</div>

<?php
}

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {
    return __( '+ Добавить в корзину', 'woocommerce' ); 
}

add_filter('woocommerce_product_tabs', 'element_product_tabs');

function element_product_tabs($product_tabs)
{
    
 // Add custom tab
    $product_tabs['characteristics'] = [
        'title' => __('Характеристики', 'woocommerce'),
        'priority' => 15,
        'callback' => 'woo_new_product_tab_content'
    ];

    $product_tabs['shipping'] = [
        'title' => __('Доставка', 'woocommerce'),
        'priority' => 20,
        'callback' => 'element_shipping_tab'
    ];

    function woo_new_product_tab_content()
    { ?>
<p>
    <?php

        if (have_rows('wc-tabs')): ?>

    <?php
            while (have_rows('wc-tabs')) : the_row();
                $title = get_sub_field('wc-tab-name');
                $val = get_sub_field('wc-tab-val');
                ?>
<div class="flex my-2 justify-between lg:w-[427px] border-b-[1px] border-[#dad8d8] mb-[25px]">
    <div class="col first-border">
        <div class="text-row flex ">
            <?= $title ?>
        </div>
    </div>
    <div class="col">
        <?= $val ?>
    </div>
</div>

<?php endwhile;

        endif;

        ?>
</p>
<?php
    }

    function element_shipping_tab()
    { ?>
<?php  if (have_rows('wc-delivery')):
            
            while (have_rows('wc-delivery')) : the_row();

            $name = get_sub_field('wc-delivery-title');
            ?>
<div>
    <?= $name; ?>
</div>
<?php 
            endwhile;
            endif; ?>
<?php }

    if (!empty($product_tabs)) : ?>
<div class="flex mb-[50px] lg:mb-[200px] flex-col lg:flex-row">
    <div class="mb-5 lg:mb-0 woocommerce-tabs wc-tabs-wrapper mr-[30px] flex-[0_0_35%] lg:flex-[0_0_45%] ">
        <ul class="tabs wc-tabs" role="tablist">
            <?php foreach ($product_tabs as $key => $product_tab) :?>
            <li class="<?php echo esc_attr($key); ?>_tab flex justify-between woo-tab mb-[25px] lg:mb-[35px]"
                id="tab-title-<?php echo esc_attr($key); ?>" role="tab"
                aria-controls="tab-<?php echo esc_attr($key); ?>">
                <a class="tab-link text-[20px] lg:text-[30px] text-[#4F4F4F] font-semibold "
                    href="#tab-<?php echo esc_attr($key); ?>">
                    <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
                </a>
                <a href="#tab-<?php echo esc_attr($key); ?>" class="tab-link"> <img
                        class=" cursor-pointer w-[40px] h-[40px] lg:w-[50px] lg:h-[50px]"
                        src="<?php echo get_template_directory_uri() . '/assets/img/arrow-down.svg' ?>" alt="">
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php foreach ($product_tabs as $key => $product_tab) : ?>
        <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr($key); ?> panel entry-content wc-tab"
            id="tab-<?php echo esc_attr($key); ?>" role="tabpanel"
            aria-labelledby="tab-title-<?php echo esc_attr($key); ?>">
            <?php
                    if (isset($product_tab['callback'])) {
                        call_user_func($product_tab['callback'], $key, $product_tab);
                    }
                    ?>
        </div>
        <?php endforeach; ?>

        <?php do_action('woocommerce_product_after_tabs'); ?>
    </div>
    <div class="max-w-[613px] w-full p-4 lg:py-9 lg:pl-[80px] bg-[#F4F4F4]">
        <p
            class="text-[12px] leading-[20px] sm:text-[14px] lg:text-[18px] sm:leading-[22px] font-normal lg:leading-[29px] ">
            Также наш товар можно приобрести <br> в других магазинах:
        </p>
        <ul class="mt-4 flex items-center gap-[10px] lg:gap-[30px]">
            <li class="w-[100px] h-[100px] flex justify-center items-center bg-white">
                <a href="">
                    <img class="" src="<?php echo get_template_directory_uri() ?>/woocommerce/assets/img/ashan.png"
                        alt="">
                </a>
            </li>
            <li class="w-[100px] h-[100px] flex justify-center items-center bg-white">
                <a href="">
                    <img class="" src="<?php echo get_template_directory_uri() ?>/woocommerce/assets/img/rozetka.png"
                        alt="">
                </a>
            </li>
            <li class="w-[100px] h-[100px] flex justify-center items-center bg-white">
                <a href="">
                    <img class="" src="<?php echo get_template_directory_uri() ?>/woocommerce/assets/img/epicentr.png"
                        alt="">
                </a>
            </li>
            <li class="w-[100px] h-[100px] flex justify-center items-center bg-white">
                <a href="">
                    <img class="" src="<?php echo get_template_directory_uri() ?>/woocommerce/assets/img/prom.png"
                        alt="">
                </a>
            </li>
        </ul>
    </div>
</div>
<?php endif;
}

add_filter('woocommerce_product_description_heading', '__return_false');

function wp_enqueue_woocommerce_style()
{
    wp_register_style('ulaizer-woocommerce', get_template_directory_uri() . '/css/woocommerce.css');

    if (class_exists('woocommerce')) {
        wp_enqueue_style('ulaizer-woocommerce');
    }
}
add_action('woocommerce_before_shop_loop', 'element_shop_start', 30);
function element_shop_start()
{ ?>
<div class="flex  w-full mb-[40px]">

    <?php }

add_action('woocommerce_after_shop_loop', 'element_shop_end', 5);
function element_shop_end()
{ ?>
</div>

<?php }

add_action('woocommerce_before_main_content', 'element_shop_container_start');

function element_shop_container_start()
{ ?>
<div class="container mx-auto px-5">

    <?php }

add_action('woocommerce_after_main_content', 'element_shop_container_end');

function element_shop_container_end()
{ ?>
</div>

<?php }
add_filter('woocommerce_subcategory_count_html', 'element_category_count', 10, 2);

function element_category_count($html, $category)
{
    return $html = '<sub class=" ml-3 text-[15px] sm:text-[30px] font-normal ">'.$category->count.'</sub>';
}
add_action('woocommerce_before_shop_loop_item_title', 'element_thumb_open', 5);
function element_thumb_open()
{ ?>
<div class="lg:w-[295px] lg:h-[332px] w-full h-full flex items-center justify-center bg-white">
    <?php }

add_action('woocommerce_before_shop_loop_item_title', 'element_thumb_close', 15);
function element_thumb_close()
{ ?>
</div>
<?php }

add_action('woocommerce_before_shop_loop_item', 'element_start', 5);
function element_start()
{?>
<div class="p-[25px] flex flex-col items-center w-full h-full md:w-[555px] md:h-[584px] bg-[#fafafa]">
    <?php }

add_action('woocommerce_after_shop_loop_item', 'element_end', 40);
function element_end()
{?>
</div>
<?php }


add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
return array(
'width' => 350,
'height' => 350,
'crop' => 0,
);
} );

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

add_action('woocommerce_before_single_product_summary', 'element_custom_single_product_thumbnail');

function element_custom_single_product_thumbnail()
{ ?>
<?php global $product; ?>

<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->id ), 'single-post-thumbnail' );?>

<div>
    <img src="<?php  echo $image[0]; ?>">
</div>

<?php }
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', 'element_thumbnail', 10);
function element_thumbnail()
{ ?>
<?php global $product; ?>

<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->id ), 'single-post-thumbnail' );?>

<div>
    <img src="<?php  echo $image[0]; ?>">
</div>

<?php }

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 15);


add_action('woocommerce_after_shop_loop_item', 'element_product_prcie_container_open', 10);
function element_product_prcie_container_open()
{ ?>
<div class="flex flex-col md:flex-row items-start justify-between  md:items-center w-full ">
    <?php }

 add_action('woocommerce_after_shop_loop_item', 'element_product_prcie_container_close', 40);
function element_product_prcie_container_close()
{ ?>
</div>
<?php }

add_action('woocommerce_after_shop_loop_item', 'element_one_click_prodcut_cart', 25);
function element_one_click_prodcut_cart()
{ ?>
<a href="#"
    class="btn-one-click text-[12px] lg:text-[16px] px-[15px] py-[10px] font-semibold bg-acentYellow rounded-full text-white">
    Купить в один клик
</a>
<?php }

add_filter( 'woocommerce_product_add_to_cart_text', '__return_false' );

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 30);

add_action('woocommerce_after_shop_loop_item', 'element_flex_buy_open', 20);

function element_flex_buy_open()
{ ?>
<div class="flex gap-[25px] items-center">
    <?php }
add_action('woocommerce_after_shop_loop_item', 'element_flex_buy_close', 35);

function element_flex_buy_close()
{ ?>
</div>
<?php }

add_action('wp_footer', 'element_modal_one_click');

function element_modal_one_click()
{
       require_once get_template_directory() . '/woocommerce/includes/modals/one-click.php';

}

add_action( 'after_setup_theme', 'element_remove_product_result_count', 99 );
function element_remove_product_result_count() { 
    remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );
}
add_action('woocommerce_archive_description','element_filter', 15);
function element_filter()
{
    if (is_product_category()){
        

     }
}

function woocommerce_button_proceed_to_checkout() {
	
       $new_checkout_url = WC()->cart->get_checkout_url();
       ?>
<a href="<?php echo $new_checkout_url; ?>" class="checkout-button button alt wc-forward">

    <?php _e( 'Оформить заказ', 'woocommerce' ); ?></a>

<?php
}

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 ); 


add_filter('woocommerce_checkout_fields', 'element_remove_checkout_fields');

function element_remove_checkout_fields($fields)
{

    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_address_1']);
    unset($fields['billing']['billing_address_2']);
    unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_postcode']);
    
    return $fields;

}

add_action('wc_add_to_cart_message_html', 'message');

function message (){
    function add_cart_message()
    { ?>
<div class="modal-buy-single fixed top-0 left-0 right-0 bottom-0 z-20">
    <div class="overlay fixed top-0 left-0 ring-0 bottom-0 bg-opacity w-full h-full z-20">
    </div>
    <div
        class="py-[90px] overflow-scroll z-20 px-[10px] sm:px-[65px] fixed left-[50%] top-[50%] translate-x-[-50%] translate-y-[-50%] w-full h-full sm:w-[950px] sm:h-[570px] bg-[url('../../woocommerce/assets/img/bg-modal.png')]">
        <div class="modal-close absolute top-[25px] sm:top-[80px] right-4 sm:right-[55px] cursor-pointer">
            <img src="<?php echo get_template_directory_uri() ?>/woocommerce/assets/img/close.svg" alt="arrow-shop">
        </div>
        <div class="text-white text-[22px] lg:text-[44px] font-medium uppercase mb-[40px]">
            Ваш товар добавлен в корзину
        </div>

        <div class="text-white flex flex-col h-[500px gap-[25px]">
            <?php   
             foreach ( WC()->cart->get_cart() as $cart_item ):
                $item = $cart_item['data'];
                if(!empty($item)):
                    $product = new WC_product($item->id); ?>
            <div class="flex items-center gap-[25px]">
                <div class="w-[245px] h-[228px] bg-white p-[20px] flex-[0_0_40%]">
                    <?= $product->get_image(); ?>
                </div>
                <div class="flex flex-col">
                    <div class="max-w-[440px] font-semibold text-[30px]">
                        <?= $product->name ?>
                    </div>
                    <div class="flex gap-[30px] mt-8">
                        <a class="text-[18px] flex justify-center items-center bg-[#ff9309] rounded-[50px] cursor-pointer w-[230px] h-[45px]"
                            href="">
                            Продолжить покупки
                        </a>
                        <a class="text-[18px] flex justify-center items-center bg-[#ff9309] rounded-[50px] cursor-pointer w-[230px] h-[45px]"
                            href="<?php echo wc_get_cart_url(); ?>">
                            Перейти в корзину
                        </a>
                    </div>
                </div>
            </div>
            <?php endif;  ?>
            <?php endforeach; ?>

        </div>
    </div>
</div>


<?php  }

    $message = add_cart_message();
    return $message;
}