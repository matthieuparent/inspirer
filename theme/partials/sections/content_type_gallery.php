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
    class="section b-gallery<?php echo $triangle_shape ?> grid-wrapper<?php echo (is_null($content) || $content== 'automatic') ? '' : ' sections--colors-content-' . $content ?><?php echo (is_null($accent) || $accent== 'automatic') ? '' : ' sections--colors-highlight-' . $accent ?><?php echo ($main == 'automatic') ? '' : ' sections--colors-section-' . $main; ?>">
    <div class="grid-center">
        <div class="grid grid-6 num-<?php echo count(get_sub_field('content_type_gallery_images')); ?>">
            <?php if( have_rows('content_type_gallery_images') ):
                $count = 0 ?>
            <?php while( have_rows('content_type_gallery_images') ): 
                        the_row(); 
                        $image = get_sub_field('image');
                        $anim = ["fromLeft", "fromTop", "fromRight", "fromBottom"];
                    ?>
            <?php if( !empty( $image ) ): ?>
            <div class="image"><img src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>" data-scrolly="<?php echo $anim[$count]; ?>" />
            </div>
            <?php endif; ?>
            <?php 
                $count++;
                endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>