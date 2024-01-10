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
$icon = get_sub_field('content_type_two_cols_quote_icone');
$reverse = get_sub_field('content_type_two_cols_reverse') ? " b-text--reverse" : "";
?>

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
    class="section b-text<?php echo $reverse; ?><?php echo $triangle_shape ?> grid-wrapper<?php echo (is_null($content) || $content== 'automatic') ? '' : ' sections--colors-content-' . $content ?><?php echo (is_null($accent) || $accent== 'automatic') ? '' : ' sections--colors-highlight-' . $accent ?><?php echo ($main == 'automatic') ? '' : ' sections--colors-section-' . $main; ?>">
    <div class="grid-center">
        <div class="grid grid-7">
            <div class="b-text__col">
                <?php if (get_sub_field('content_type_two_cols_title')) : ?>
                <svg class="icon b-text__liner" data-scrolly="fromLeft">
                    <use xlink:href="#icon-liner"></use>
                </svg>
                <div class="b-text__col__content">
                    <h3 data-scrolly="fromLeft"><?php echo get_sub_field('content_type_two_cols_title'); ?></h3>
                </div>
                <?php endif; ?>
                <?php if (get_sub_field('content_type_two_cols_quote')) : ?>
                <p class="b-text__citation" data-scrolly="fromBottom">
                    <?php if( !empty( $icon ) && $icon !== "none" ): ?>
                    <svg class="icon">
                        <use xlink:href="#icon-<?php echo $icon ?>"></use>
                    </svg>
                    <?php endif ?>
                    <?php echo get_sub_field('content_type_two_cols_quote'); ?>
                    <svg class="icon b-text__liner">
                        <use xlink:href="#icon-liner-round"></use>
                    </svg>
                </p>
                <?php endif; ?>
            </div>
            <div class="b-text__col b-text__col--border" data-scrolly="fromBottom">
                <?php echo get_sub_field('content_type_two_cols_content'); ?>
            </div>
        </div>
    </div>
</section>