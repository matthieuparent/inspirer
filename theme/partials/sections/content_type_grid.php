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
    class="section b-grid<?php echo $triangle_shape ?> grid-wrapper<?php echo (is_null($content) || $content== 'automatic') ? '' : ' sections--colors-content-' . $content ?><?php echo (is_null($accent) || $accent== 'automatic') ? '' : ' sections--colors-highlight-' . $accent ?><?php echo ($main == 'automatic') ? '' : ' sections--colors-section-' . $main; ?>">
    <div class="grid-center">
        <div class="title title--one-line" data-scrolly="fromLeft">
            <div class="title__content">
                <h3><?php echo get_sub_field("content_type_grid_title"); ?></h3>
                <?php if( !empty( $icon ) && $icon !== "none" ): ?>
                <svg class="icon">
                    <use xlink:href="#icon-<?php echo $icon ?>"></use>
                </svg>
                <?php endif ?>
            </div>
        </div>
        <?php if( have_rows('content_type_grid_lists') ): ?>
        <ul class="grid grid-5">
            <?php while( have_rows('content_type_grid_lists') ): 
                        the_row(); 
                    ?>
            <li class="b-list__item" data-scrolly="fromBottom">
                <h4><?php echo get_sub_field("title"); ?></h4>
                <?php echo get_sub_field("list_content"); ?>
            </li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>
</section>