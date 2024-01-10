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
    class="section b-faq<?php echo $triangle_shape ?> grid-wrapper<?php echo (is_null($content) || $content== 'automatic') ? '' : ' sections--colors-content-' . $content ?><?php echo (is_null($accent) || $accent== 'automatic') ? '' : ' sections--colors-highlight-' . $accent ?><?php echo ($main == 'automatic') ? '' : ' sections--colors-section-' . $main; ?>">
    <div class="grid-center">
        <h3 data-scrolly="fromLeft"><?php echo get_sub_field('content_type_faq_title') ?></h3>
        <div class="questions" data-component="Accordion">
            <?php if( have_rows('content_type_faq_questions') ): ?>
            <?php while( have_rows('content_type_faq_questions') ): 
                        the_row(); 
                    ?>
            <div class="question" data-scrolly="fromBottom">
                <div class="question__titre">
                    <svg class="icon icon-plus">
                        <use xlink:href="#icon-plus"></use>
                    </svg>
                    <svg class="icon icon-minus">
                        <use xlink:href="#icon-minus"></use>
                    </svg>
                    <h6><?php echo get_sub_field('questions_question'); ?></h6>
                </div>
                <div class="question__reponse">
                    <div class="reponse__wrapper">
                        <?php echo get_sub_field('questions_answer'); ?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>