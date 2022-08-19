<section data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500" class="blocks mt-[60px] lg:mt-[120px] ">
    <div class="container mx-auto ">
        <div class="flex flex-col sm:flex-row justify-center items-center flex-wrap gap-[10px] 2xl:gap-[30px]">
            <?php 
            
            if( have_rows('blocks') ):

                while( have_rows('blocks') ) : the_row();
        
                    $img = get_sub_field('block-img');
                    $text = get_sub_field('block-text');  
                          
               ?>

            <div
                class="flex justify-center items-center flex-col w-[198px] xl:w-[360px] h-[175px] xl:h-[215px] border-[#C4C4C4] border">
                <div class="bloc-img pb-9 lg:pb-[20px]">
                    <img src="<?= $img['url'] ?>" alt="<?= $img['title']; ?>">
                </div>
                <div
                    class="text-center text-acentYellow text-[14px] xl:text-[24px] xl:leading-[38px] leading-[23px] font-semibold">
                    <?= $text; ?>
                </div>
            </div>

            <?php   endwhile;
            endif; ?>
        </div>
    </div>
</section>
