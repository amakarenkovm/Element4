<?php
$title1 = get_field('text-1');
$title2 = get_field('text-2');
$title3 = get_field('text-3');
$text1 = get_field('text-desc-1');
$text2 = get_field('text-desc-2');
$text3 = get_field('text-desc-3');
?>
<section class="text pb-[80px] 2xl:pb-[200px]">
    <div class=" container mx-auto mt-[100px] 2xl:mt-[200px]">
        <div class="flex  flex-col gap-[45px]  pl-2 2xl:mx-auto">
            <div data-aos="fade-left" class="flex group relative ">
                <div
                    class="trigger  text-second uppercase pointer text-[32px] sm:text-[50px] lg:text-[100px] leading-[75px] lg:leading-[150px] cursor-pointer hover:text-acentYellow ease-in duration-300 sm:translate-x-[50px]  xl:translate-x-[40px] 2xl:translate-x-[250px]">
                    <?= $title1; ?>
                </div>
                <div
                    class="absolute scale-0  group-hover:scale-100 right-0 sm:right-[20px] md:right-[120px] lg:right-[0px] xl:right-[200px] top-[-100px] sm:top-[-40px] xl:top-[-90px] anim-text ease-in duration-300 w-[140px] h-[140px] lg:w-[220px] lg:h-[220px] px-2 rounded-full bg-acentYellow text-white text-[10px] lg:text-[13px] text-center flex  justify-center  items-center">
                    <?= $text1; ?>
                </div>
            </div>
            <div data-aos="fade-right" class="flex group relative">
                <div
                    class="triggerTwo close-triger text-second uppercase pointer text-[32px] sm:text-[50px] lg:text-[100px] cursor-pointer hover:text-acentYellow ease-in duration-300 leading-[75px] lg:leading-[150px] translate-x-[65px] sm:translate-x-[226px] xl:translate-x-[280px] 2xl:translate-x-[520px]">
                    <?= $title2; ?>
                </div>
                <div
                    class=" absolute group-hover:scale-100  right-0 xl:right-0 top-[60px] xl:top-[-90px] sm:top-[70px] lg:top-[130px] anim-text-2  ease-in duration-300 w-[160px] h-[160px] lg:w-[220px] lg:h-[220px] px-2 rounded-full bg-acentYellow text-white text-[10px] lg:text-[13px] text-center scale-0 flex  justify-center  items-center">
                    <?= $text2 ?>
                </div>
            </div>
            <div data-aos="fade-left" class="flex group relative">
                <div
                    class="triggerThree text-second uppercase pointer text-[32px] sm:text-[50px] lg:text-[100px] cursor-pointer hover:text-acentYellow ease-in duration-300 leading-[75px] lg:leading-[150px] sm:translate-x-[97px] xl:translate-x-[180px] 2xl:translate-x-[400px]">
                    <?= $title3; ?>
                </div>
                <div
                    class=" absolute sm:right-[120px] top-[-40px] right-[70px] xl:right-[430px] md:right-[220px] anim-text-3 group-hover:scale-100 ease-in duration-300 w-[140px] h-[140px] lg:w-[220px] lg:h-[220px] px-2 rounded-full bg-acentYellow text-white text-[10px] lg:text-[13px] text-center scale-0 flex  justify-center  items-center">
                    <?= $text3 ?>
                </div>
            </div>
        </div>
    </div>
</section>
