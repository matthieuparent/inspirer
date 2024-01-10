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
$icon = get_sub_field('content_type_grid_icon');

if(get_sub_field('content_type_section_before') =="reverse") {
    $triangle_shape = " section--fig section--fig--reverse section--colors-previous-" .get_sub_field('content_type_section_before_color');
} elseif(get_sub_field('content_type_section_before') == "normal")
{
    $triangle_shape = " section--fig section--colors-previous-" .get_sub_field('content_type_section_before_color');
}
?>

<section
    class="section videos sections--colors-section-marine grid-wrapper <?php echo $triangle_shape ?><?php echo (is_null($content) || $content== 'automatic') ? '' : ' sections--colors-content-' . $content ?><?php echo (is_null($accent) || $accent== 'automatic') ? '' : ' sections--colors-highlight-' . $accent ?><?php echo ($main == 'automatic') ? '' : ' sections--colors-section-' . $main; ?>"
    data-scrolly="fromAlpha">
    <div class="grid-center">
        <div class="title title--arrow" data-scrolly="fromLeft">
            <svg class="icon">
                <use xlink:href="#icon-arrow"></use>
            </svg>
            <div class="title__content">
                <h3><?php echo the_sub_field('content_type_video_title'); ?></h3>
            </div>
        </div>
        <div class="grid grid-2">

            <?php if( have_rows('content_type_video_videos') ): ?>

            <?php while( have_rows('content_type_video_videos') ): 
                        the_row(); 
                    ?>
            <div class="video" data-scrolly="fromBottom" data-component="Video"
                data-video-id="<?php echo the_sub_field('video_id'); ?>" data-controls="true">
                <div class="video__media js-video">
                    <?php
                            $image = get_sub_field('video_image');
                            
                        ?>
                    <?php if( !empty( $image ) ): ?>
                    <img class="js-poster" src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>

                    <button class="btn-play">
                        <svg class="icon icon--md">
                            <use xlink:href="#icon-play"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <?php endwhile; ?>

            <?php endif; ?>
        </div>
    </div>
</section>