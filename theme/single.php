<?php get_header(); ?>

<?php if( have_rows('post_section_before_colors') ): ?>
<?php while( have_rows('post_section_before_colors') ): the_row(); 

        // Get sub field values.
        $main = get_sub_field('color_section');
        $content = get_sub_field('color_content');
        $accent = get_sub_field('color_highlight');

        ?>


<?php endwhile; ?>
<?php endif; ?>
<?php 
$icon = get_field('post_section_title_icon');

$triangle_shape = "";

if(get_field('post_section_triangle') == "reverse") {
    $triangle_shape = " section--fig section--fig--reverse section--colors-previous-" .get_field('post_section_before_color');
} elseif(get_field('post_section_triangle') == "normal")
{
    $triangle_shape = " section--fig section--colors-previous-" .get_field('post_section_before_color');
}
?>
<?php 
$author_id = $post->post_author;
$featured_posts = get_field('post_related_article');

?>
<section class="hero">
    <div class="hero__media">
        <?php echo get_the_post_thumbnail( $post->ID, 'full'); ?>
    </div>
</section>
<section
    class="section b-single<?php echo $triangle_shape; ?> grid-wrapper<?php echo (is_null($content) || $content== 'automatic') ? '' : ' sections--colors-content-' . $content ?><?php echo (is_null($accent) || $accent== 'automatic') ? '' : ' sections--colors-highlight-' . $accent ?><?php echo ($main == 'automatic') ? '' : ' sections--colors-section-' . $main; ?>">
    <div class="grid-center">
        <div class="grid grid-2<?php echo (!empty($featured_posts)) ? '' : ' no-aside' ?>">
            <div class="single__content">
                <div class="title title--one-line" data-scrolly="fromLeft">
                    <div class="title__content">
                        <svg class="icon icon-orange">
                            <use xlink:href="#icon-splash"></use>
                        </svg>
                        <h1><?php the_title() ?></h1>
                    </div>
                </div>
                <?php if (get_field('post_section_author')) :?>
                <div class=" single__information">
                    <div class="information__author">
                        <?php $image = get_field('post_section_author_image'); ?>
                        <?php if( !empty( $image ) ): ?>
                        <div class="author__media">

                            <img src="<?php echo esc_url($image['url']); ?>"
                                alt="<?php echo esc_attr($image['alt']); ?>" />

                        </div>
                        <?php endif; ?>
                        <div class="author__content">
                            <p><?php echo get_field('post_section_author') ?></p>
                            <p><?php echo get_field('post_section_author_desc') ?></p>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php the_content() ?>
            </div>
            <?php
            
            if( $featured_posts ): ?>
            <aside class="single__aside">
                <div class="title title--one-line" data-scrolly="fromLeft">
                    <div class="title__content">
                        <svg class="icon">
                            <use xlink:href="#icon-star"></use>
                        </svg>
                        <h2><?php _e("À lire aussi","gbi_inspire"); ?></h2>
                    </div>
                </div>
                <div class="cards">
                    <?php foreach( $featured_posts as $post ): 
                    setup_postdata($post); ?>
                    <a href="<?php the_permalink(); ?>" class="card" data-scrolly="fromAlpha">
                        <div class="card__media">
                            <?php echo get_the_post_thumbnail( $post->ID, 'medium'); ?>
                        </div>
                        <div class="card__content">
                            <h6><?php the_title(); ?></h6>
                            <?php
                                $resume = get_the_excerpt();
                                $resume = wp_trim_words($resume, $num_words = 30, "[...]");
                            ?>
                            <p><?php echo $resume ?></p>
                            <div class="card__content__footer">
                                <p class="card__content__date">
                                    <svg class="icon">
                                        <use xlink:href="#icon-calendar"></use>
                                    </svg>
                                    <span><?php echo get_the_date('j F Y'); ?></span>
                                </p>
                                <button class="link link--arrow"><?php _e("En savoir plus","gbi_inspire"); ?> <svg
                                        class="icon">
                                        <use xlink:href="#icon-arrow"></use>
                                    </svg></button>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; ?>
                </div>
            </aside>
            <?php 
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>