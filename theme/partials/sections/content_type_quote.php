<?php 
$image = get_sub_field('content_type_quote_bg');
$image_over = get_sub_field('content_type_quote_bg_over');
?>


<section class="section b-quote section ">
    <div class="b-quote__media" data-scrolly="fromAlpha">
        <?php if( !empty( $image ) ): ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php endif; ?>
        <?php if( !empty( $image_over ) ): ?>
        <img class="b-quote__media__over" src="<?php echo esc_url($image_over['url']); ?>"
            alt="<?php echo esc_attr($image_over['alt']); ?>" />
        <?php endif; ?>
    </div>
    <div class="b-quote__content" data-scrolly="fromBottom">
        <h3><?php echo get_sub_field("content_type_quote_title"); ?></h3>
    </div>

</section>