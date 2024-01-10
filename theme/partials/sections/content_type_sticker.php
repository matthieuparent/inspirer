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
    class="section b-sticker<?php echo $triangle_shape ?> grid-wrapper<?php echo (is_null($content) || $content== 'automatic') ? '' : ' sections--colors-content-' . $content ?><?php echo (is_null($accent) || $accent== 'automatic') ? '' : ' sections--colors-highlight-' . $accent ?><?php echo ($main == 'automatic') ? '' : ' sections--colors-section-' . $main; ?>">
    <div class="grid-center">
        <?php if(get_sub_field("content_type_sticker_title")) : ?>
        <div class="title title--one-line" data-scrolly="fromLeft">
            <div class="title__content">
                <h3><?php echo get_sub_field("content_type_sticker_title"); ?></h3>
                <p class="title__sub"><?php echo get_sub_field("content_type_sticker_subtitle"); ?></p>
                <svg class="icon">
                    <use xlink:href="#icon-star"></use>
                </svg>
            </div>
        </div>
        <?php endif; ?>
        <div class="grid grid-3">
            <?php if( have_rows('content_type_sticker_stickers') ): ?>
            <?php while( have_rows('content_type_sticker_stickers') ): 
                        the_row(); 
                        $image = get_sub_field('sticker_image');
                        $link = get_sub_field('link');
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"
                class="sticker sticker--marine sticker--nomedia" data-scrolly="fromBottom">
                <div class="sticker__content">
                    <?php if( get_sub_field('choice') ) : ?>

                    <h4><?php echo get_sub_field('texte'); ?></h4>
                    <?php else: ?>
                    <?php if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    <?php endif; ?>


                </div>
            </a>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>