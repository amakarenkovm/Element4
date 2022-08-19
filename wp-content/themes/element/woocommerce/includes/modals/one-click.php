 <?php if( is_product() || is_product_category()): global $product; ?>
 <div class="modal-one-click hidden">
     <div class="overlay fixed top-0 left-0 ring-0 bottom-0 bg-opacity w-full h-full">
     </div>
     <div
         class="py-[90px] px-[10px] sm:px-[65px] fixed left-[50%] top-[50%] translate-x-[-50%] translate-y-[-50%] w-full h-full sm:w-[730px] sm:h-[570px] bg-[url('../../woocommerce/assets/img/bg-modal.png')]">
         <div class="modal-close absolute top-[25px] sm:top-[80px] right-4 sm:right-[55px] cursor-pointer">
             <img src="<?php echo get_template_directory_uri() ?>/woocommerce/assets/img/close.svg" alt="arrow-shop">
         </div>
         <div class="text-white uppercase tex-[28px] sm:text-[30px]"> Оформление заказа</div>
         <div class="mt-4 text-[12px] sm:text-[14px] text-white">
             Укажите ваше имя и номер телефона. Мы свяжемся </br> с вами в ближайшее время.
         </div>
         <div>
             <a id="one-click" class="single_dd_to_cart_button " data-price="<?php echo $product->get_price(); ?>"
                 data-title="<?php the_title(); ?>">
             </a>
             <?php echo do_shortcode('[contact-form-7 id="157" title="Покупка в один клик"]');?>
         </div>
     </div>

 </div>
 <?php else: return false; endif; ?>
