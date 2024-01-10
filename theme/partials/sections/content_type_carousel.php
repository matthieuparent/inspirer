<?php if( have_rows('content_type_section_colors') ): ?>
<?php while( have_rows('content_type_section_colors') ): the_row(); 

        // Get sub field values.
        $main = get_sub_field('content_type_color_section');
        $content = get_sub_field('content_type_color_content');
        $accent = get_sub_field('content_type_color_highlight');

        ?>


<?php endwhile; ?>
<?php endif; ?>
<?php 
$triangle_shape = "";

if(get_sub_field('content_type_section_before') =="reverse") {
    $triangle_shape = " section--fig section--fig--reverse section--colors-previous-" .get_sub_field('content_type_section_before_color');
} elseif(get_sub_field('content_type_section_before') == "normal")
{
    $triangle_shape = " section--fig section--colors-previous-" .get_sub_field('content_type_section_before_color');
}
?>
<section
    class="section b-carousel<?php echo $triangle_shape ?> grid-wrapper<?php echo (is_null($content) || $content== 'automatic') ? '' : ' sections--colors-content-' . $content ?><?php echo (is_null($accent) || $accent== 'automatic') ? '' : ' sections--colors-highlight-' . $accent ?><?php echo ($main == 'automatic') ? '' : ' sections--colors-section-' . $main; ?>">
    <div class="grid-center">
        <div class="title title--arrow" data-scrolly="fromLeft">
            <div class="title__content">
                <h3><?php echo get_sub_field('content_type_carousel_title'); ?></h3>
                <p class="title__sub"><?php echo get_sub_field('content_type_carousel_subtitle'); ?>
                </p>
            </div>
        </div>
        <div data-scrolly="fromBottom">
            <div class="swiper-container carousel" data-component="Carousel" data-carousel-type="itunes">
                <div class="swiper-wrapper">
                    <?php if( have_rows('content_type_carousel_images') ): ?>
                    <?php while( have_rows('content_type_carousel_images') ): 
                        the_row(); 
                        $image = get_sub_field('carousel_image');
                    ?>
                    <div class="swiper-slide">
                        <div class="swiper-slide__content">
                            <p><?php echo get_sub_field('carousel_legend'); ?></p>
                        </div>
                        <div class="swiper-slide__media">
                            <?php if( !empty( $image ) ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>

                </div>
                <div class="swiper-button-prev">
                    <svg class="icon">
                        <use xlink:href="#icon-arrow-prev"></use>
                    </svg>
                </div>
                <div class="swiper-button-next">
                    <svg class="icon">
                        <use xlink:href="#icon-arrow-next"></use>
                    </svg>
                </div>
            </div>
        </div>
        <div class="swiper-pagination" data-scrolly="fromBottom"></div>
    </div>
</section>