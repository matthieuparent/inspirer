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
$icon = get_sub_field('content_type_blog_card_icon');

$triangle_shape = "";

if(get_sub_field('content_type_section_before') =="reverse") {
    $triangle_shape = " section--fig section--fig--reverse section--colors-previous-" .get_sub_field('content_type_section_before_color');
} elseif(get_sub_field('content_type_section_before') == "normal")
{
    $triangle_shape = " section--fig section--colors-previous-" .get_sub_field('content_type_section_before_color');
}
?>
<section
    class="section b-blog<?php echo $triangle_shape ?> grid-wrapper<?php echo (is_null($content) || $content== 'automatic') ? '' : ' sections--colors-content-' . $content ?><?php echo (is_null($accent) || $accent== 'automatic') ? '' : ' sections--colors-highlight-' . $accent ?><?php echo ($main == 'automatic') ? '' : ' sections--colors-section-' . $main; ?>">
    <div class="grid-center">
        <div class="title title--splash" data-scrolly="fromLeft">
            <?php if( !empty( $icon ) && $icon !== "none" ): ?>
            <svg class="icon">
                <use xlink:href="#icon-<?php echo $icon ?>"></use>
            </svg>
            <?php endif ?>
            <div class="title__content">
                <h3><?php echo get_sub_field("content_type_blog_card_title"); ?></h3>
                <p class="title__sub"><?php echo get_sub_field("content_type_blog_card_subtitle"); ?></p>
            </div>
        </div>
        <div class="grid grid-4">

            <?php if( have_rows('content_type_blog_card_article') ): ?>
            <?php while( have_rows('content_type_blog_card_article') ): 
                        the_row(); 
                    ?>
            <?php
                    $featured_posts = get_sub_field('article');
                    if( $featured_posts ): ?>
            <?php foreach( $featured_posts as $post ): 

                            // Setup this post for WP functions (variable must be named $post).
                            setup_postdata($post); ?>
            <a href="<?php the_permalink(); ?>" class="card" data-scrolly="fromAlpha">
                <div class="card__media">
                    <?php echo get_the_post_thumbnail( $post->ID, 'medium'); ?>
                </div>
                <div class="card__content">
                    <h6><?php the_title(); ?></h6>
                    <p><?php the_excerpt(); ?></p>
                    <div class="card__content__footer">
                        <p class="card__content__date">
                            <svg class="icon">
                                <use xlink:href="#icon-calendar"></use>
                            </svg>
                            <span><?php echo get_the_date('j F Y'); ?></span>
                        </p>
                        <button class="link link--arrow"><?php _e("En savoir plus","gbi_inspire"); ?> <svg class="icon">
                                <use xlink:href="#icon-arrow"></use>
                            </svg></button>
                    </div>
                </div>
            </a>
            <?php endforeach; ?>
            <?php 
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>