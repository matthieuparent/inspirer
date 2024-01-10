<?php get_header(); ?>

<section class="hero">
    <div class="hero__media" data-scrolly="fromAlpha">
        <?php
             $image = get_field('inspirer_blogue_hero_media', get_option('page_for_posts', true) );
        ?>
        <?php if( !empty( $image ) ): ?>
        <div class="image"><img src="<?php echo esc_url($image['url']); ?>"
                alt="<?php echo esc_attr($image['alt']); ?>">
        </div>
        <?php endif; ?>
    </div>
    <div class="hero__content" data-scrolly="fromBottom">
        <h1><?php echo get_the_title( get_option('page_for_posts', true) ); ?></h1>
    </div>
</section>

<section
    class="section sections--colors-content-marine sections--colors-highlight-marine sections--colors-section-green section--fig grid-wrapper">
    <div class="grid-center">
        <div class="title title--splash" data-scrolly="fromLeft">
            <svg class="icon">
                <use xlink:href="#icon-splash"></use>
            </svg>
            <div class="title__content">
                <h3><?php echo get_field('inspirer_blogue_title', get_option('page_for_posts', true) ); ?></h3>
                <p class="title__sub">
                    <?php echo get_field('inspirer_blogue_subtitle', get_option('page_for_posts', true) ); ?></p>
            </div>
        </div>
        <div class="grid grid-4">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <a href="<?php the_permalink() ?>" class="card" data-scrolly="fromBottom">
                <div class="card__media">
                    <?php echo get_the_post_thumbnail() ?>
                </div>
                <div class="card__content">
                    <h6><?php the_title() ?></h6>
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
                            <span><?php the_time('j F Y'); ?></span>
                        </p>
                        <button class="link link--arrow"><?php _e("En savoir plus","gbi_inspire"); ?> <svg class="icon">
                                <use xlink:href="#icon-arrow"></use>
                            </svg></button>
                    </div>
                </div>
            </a>
            <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>


        </div>
        <div class="grid blog__submit">
            <?php   $link = get_field('inspirer_blog_submit', 'option');
                $link_url = $link['url'];
                $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a class="link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                <?php echo $link['title'] ?>
                <svg class="icon">
                    <use xlink:href="#icon-arrow"></use>
                </svg></a>
        </div>
        <!--<div class="section__options" data-scrolly="fromRight">
            <a href="#" class="button button--green">En voir plus</a>
        </div>-->
    </div>
</section>


<?php get_footer(); ?>