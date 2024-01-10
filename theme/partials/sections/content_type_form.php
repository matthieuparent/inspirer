<?php 
$image = get_sub_field('content_type_quote_bg');
$image_over = get_sub_field('content_type_quote_bg_over');
?>

<section class="section b-form grid-wrapper  sections--colors-section-lightmarine">

    <div class="grid-center">
        <div class="title title--splash" data-scrolly="fromLeft">
            <?php if( !empty( $icon ) && $icon !== "none" ): ?>
            <svg class="icon">
                <use xlink:href="#icon-<?php echo $icon ?>"></use>
            </svg>
            <?php endif ?>
            <div class="title__content">
                <h3><?php echo get_sub_field("content_type_form_title"); ?></h3>
                <p><?php echo get_sub_field("content_type_form_content"); ?></p>

            </div>
        </div>
        <?php echo get_sub_field("content_type_form_shortcode"); ?>
    </div>
</section>