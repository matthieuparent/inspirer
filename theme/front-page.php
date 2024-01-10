<?php get_header(); ?>

<section class="hero">
    <div class="hero__media">
        <video muted autoplay loop src="<?php echo get_template_directory_uri() ?>/dist/videos/intro.mp4"></video>
    </div>
    <div class="hero__content">
        <h1 data-scrolly='fromBottom'>
            <?php echo the_field('inspirer_home_title') ?><span><?php echo the_field('inspirer_home_subtitle'); ?></span>
        </h1>
    </div>
</section>
<section class="section section--fig sections--colors-content-green sections--colors-section-marine intro grid-wrapper">
    <div class="grid-center">
        <div class="intro__media" data-scrolly='flipFromBottom'>
            <div class="video" data-component="Video"
                data-video-id="<?php echo the_field('inspirer_home_intro_youtube_id'); ?>" data-controls="true">
                <div class="video__media js-video">
                    <img class="js-poster"
                        src="<?php echo get_template_directory_uri() ?>/dist/images/videos/poster.jpg"
                        alt="Spectacle de musique" />
                    <button class="btn-play">
                        <svg class="icon icon--md">
                            <use xlink:href="#icon-play"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="intro__content" data-scrolly='fromBottom'>
            <svg class="icon intro__content__liner">
                <use xlink:href="#icon-liner"></use>
            </svg>
            <h2><?php echo the_field('inspirer_home_intro_title'); ?></h2>
            <?php echo the_field('inspirer_home_intro_content'); ?>
        </div>
    </div>
</section>
<section class="section map section--no--fig grid-wrapper">
    <div class="grid-center">
        <h2>
            <svg class="icon icon--md">
                <use xlink:href="#icon-star"></use>
            </svg>
            <?php _e('Découvre argenteuil','gbi_inspire'); ?>

        </h2>
        <img class="js-poster" src="<?php echo get_template_directory_uri() ?>/dist/images/map.png"
            alt="Spectacle de musique" />
    </div>
</section>
<section class="section axes section--no--fig  grid-wrapper">
    <div class="grid-center">
        <div class="axes__content">
            <?php if( have_rows('inspirer_home_axes') ): ?>
            <?php while( have_rows('inspirer_home_axes') ): 
                        the_row(); 
                    ?>
            <?php 
                    $image = get_sub_field('axe_image');
                    $link = get_sub_field('axe_link');
                    $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"
                class="axe axe-<?php echo get_sub_field('axe_color'); ?>">
                <div class="axe__content" data-scrolly='fromLeft'>
                    <h4><?php echo get_sub_field('axe_title'); ?></h4>
                    <p><?php echo get_sub_field('axe_subtitle'); ?></p>
                </div>
                <div class="axe__media" data-scrolly='fromRight'>
                    <svg class="icon axe__media__icon">
                        <use xlink:href="#icon-<?php echo get_sub_field('axe_icon'); ?>"></use>
                    </svg>

                    <?php if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </a>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>

</section>
<?php if(get_field('inspirer_home_video_active')) : ?>
<section class="section videos sections--colors-section-marine grid-wrapper" data-scrolly="fromAlpha">
    <div class="grid-center">
        <div class="title title--arrow" data-scrolly="fromLeft">
            <svg class="icon">
                <use xlink:href="#icon-arrow"></use>
            </svg>
            <div class="title__content">
                <h3><?php echo the_field('inspirer_home_video_title'); ?></h3>
                <p class="title__sub"><?php echo the_field('inspirer_home_video_subtitle'); ?></p>
            </div>
        </div>
        <div class="grid grid-2">

            <?php 
                    $args = array(
                        'post_type' => 'gbi_videos',
                        'posts_per_page' => 2
                    );
                    $the_query = new WP_Query( $args ); 
                    ?>
            <?php if ( $the_query->have_posts() ) : ?>

            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="video" data-scrolly="fromBottom" data-component="Video"
                data-video-id="<?php echo the_field('inspirer_video_id'); ?>" data-controls="true">
                <div class="video__media js-video">
                    <?php
                            $image = get_field('inspirer_video_media');
                            
                        ?>
                    <?php if( !empty( $image ) ): ?>
                    <img class="js-poster" src="<?php echo esc_url($image['url']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>

                    <button class="btn-play">
                        <svg class="icon icon--md">
                            <use xlink:href="#icon-play"></use>
                        </svg>
                    </button>
                </div>
            </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>

        <div class="grid-center more-detail">
            <?php   $link = get_field('inspirer_home_video_view_all');
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <a class="link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                <?php echo $link['title'] ?>
                <svg class="icon">
                    <use xlink:href="#icon-arrow"></use>
                </svg></a>
        </div>

    </div>
</section>
<?php endif; ?>
<section class="section pitch sections--colors-section-green grid-wrapper--large" data-scrolly="fromAlpha">
    <div class="grid-center">
        <div class="swiper-container carousel" data-component="Carousel">
            <div class="swiper-wrapper">
                <?php if( have_rows('inspirer_home_pitch') ): ?>
                <?php while( have_rows('inspirer_home_pitch') ): 
                        the_row(); 
                    ?>
                <?php 
                    $image = get_sub_field('pitch_image');
                    $link = get_sub_field('pitch_link');
                    $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                <div class="swiper-slide">
                    <div class="swiper-slide__content">
                        <p><?php echo get_sub_field('pitch_title'); ?></p>
                        <?php if( !empty( $link ) ): ?>
                        <a class="button" href="<?php echo esc_url( $link_url ); ?>"
                            target="<?php echo esc_attr( $link_target ); ?>"><?php echo $link['title']?></a>
                        <?php endif ?>
                    </div>
                    <div class="swiper-slide__media">
                        <?php if( !empty( $image ) ): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>

                    </div>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="swiper-button-prev">
                <svg class="icon">
                    <use xlink:href="#icon-arrow-prev"></use>
                </svg>
            </div>
            <div class="swiper-button-next">
                <svg class="icon">
                    <use xlink:href="#icon-arrow-next"></use>
                </svg>
            </div>
        </div>
    </div>
</section>
<section class="section municip  section--no--fig grid-wrapper">
    <div class="grid-center">
        <h3 class="title-number" data-scrolly="fromLeft">
            <span><?php echo the_field('inspirer_home_municip_count') ?></span><span><?php echo the_field('inspirer_home_municip_title') ?></span>
        </h3>
        <div class="grid grid-5">
            <?php if( have_rows('inspirer_home_municip') ): ?>
            <?php while( have_rows('inspirer_home_municip') ): 
                        the_row(); 
                    ?>
            <?php 
                    $image = get_sub_field('municip_image');
                    $link = get_sub_field('municip_link');
                    $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
            <?php if(get_sub_field('municip_blank')) : ?>
            <div class="sticker sticker--marine sticker--blank" data-scrolly="fromBottom">
                <div class="sticker__content">
                    <h5><?php echo get_sub_field('municip_title_blank', false, false); ?></h5>
                    <svg class="icon">
                        <use xlink:href="#icon-heart-stroke"></use>
                    </svg>
                </div>
                <div class="sticker__media">
                    <?php if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <?php else : ?>
            <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"
                class="sticker" data-scrolly="fromBottom">
                <div class="sticker__content">
                    <h5><?php echo get_sub_field('municip_title_blank', false, false); ?></h5>
                </div>
                <div class="sticker__media">
                    <?php if( !empty( $image ) ): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </a>
            <?php endif; ?>

            <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>
</section>
<section class="section jobs sections--colors-section-marine section--fig section--fig--reverse grid-wrapper">
    <div class="grid-center">
        <div class="title title--arrow" data-scrolly="fromLeft">
            <svg class="icon">
                <use xlink:href="#icon-arrow"></use>
            </svg>
            <div class="title__content">
                <h3><?php echo the_field('inspirer_home_jobs_title'); ?></h3>
                <p class="title__sub"><?php echo the_field('inspirer_home_jobs_subtitle'); ?></p>
            </div>
        </div>
        <div class="carousel__wrapper">
            <div class="swiper-container carousel--posting" data-component="Carousel" data-carousel-type="three-col">
                <div class="swiper-wrapper">
                    <?php 
                $args = array(
                    'post_type' => 'gbi_jobs',
                    'posts_per_page' => 6
                );
                $the_query = new WP_Query( $args ); 
                ?>
                    <?php if ( $the_query->have_posts() ) : ?>

                    <!-- the loop -->
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                    $location = get_field('gbi_enterprise_address');
                     ?>
                    <a href="<?php echo esc_url( the_permalink() ); ?>" class="swiper-slide posting"
                        data-scrolly="fromBottom">
                        <div class="posting__content">
                            <p class="posting__location">
                                <svg class="icon">
                                    <use xlink:href="#icon-marker"></use>
                                </svg>
                                <?php echo  $location["city"]; ?>
                            </p>
                            <h6><?php the_field('gbi_job_title');?></h6>
                            <p class="posting__enterprise"><?php the_field('gbi_job_enterprise');?></p>
                            <button class="link link--arrow">

                                <?php _e("Voir l'offre","gbi_inspire"); ?>
                                <svg class="icon">
                                    <use xlink:href="#icon-arrow"></use>
                                </svg>
                            </button>
                        </div>
                    </a>
                    <?php endwhile; ?>
                    <!-- end of the loop -->

                    <!-- pagination here -->

                    <?php wp_reset_postdata(); ?>

                    <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>

                </div>
            </div>
            <div class="swiper-button-prev">
                <svg class="icon">
                    <use xlink:href="#icon-chevron-left"></use>
                </svg>
            </div>
            <div class="swiper-button-next">
                <svg class="icon">
                    <use xlink:href="#icon-chevron-right"></use>
                </svg>
            </div>
        </div>
        <div class="jobs__options" data-scrolly="fromRight">
            <?php   $link = get_field('inspirer_home_see_all_job', 'option');
                $link_url = $link['url'];
                $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
            <a class="button button--marine" href="<?php echo esc_url( $link_url ); ?>"
                target="<?php echo esc_attr( $link_target ); ?>">
                <?php echo $link['title'] ?></a>
        </div>
    </div>

</section>
<section
    class="section blog sections--colors-section-green section--colors-previous-marine section--fig section--fig--reverse grid-wrapper">
    <div class="grid-center">
        <div class="title title--splash" data-scrolly="fromLeft">
            <svg class="icon">
                <use xlink:href="#icon-splash"></use>
            </svg>
            <div class="title__content">
                <h3><?php echo the_field('inspirer_home_blogue_title'); ?></h3>
                <p class="title__sub"><?php echo the_field('inspirer_home_blogue_subtitle'); ?></p>
            </div>
        </div>
        <div class="grid grid-3">
            <?php
            $args = array(
            'post_type' => 'post',
            'posts_per_page' => 5
            );
            $count=0;
            $the_query = new WP_Query( $args );
            ?>
            <?php if ( $the_query->have_posts() ) : ?>

            <!-- the loop -->
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <a href="<?php the_permalink() ?>" class="card"
                data-scrolly="<?php echo ($count == 0 ) ? 'fromAlpha' : 'fromBottom'; ?>">
                <div class="card__media">
                    <?php echo get_the_post_thumbnail() ?>
                </div>
                <div class="card__content">
                    <h6><?php the_title() ?></h6>
                    <?php
                        $resume = get_the_excerpt();
                        if($count > 0 ) {
                            $resume = wp_trim_words($resume, $num_words = 30, "[...]");
                        }
                        ?>
                    <p><?php echo $resume ?></p>
                    <div class="card__content__footer">
                        <p class="card__content__date">
                            <svg class="icon">
                                <use xlink:href="#icon-calendar"></use>
                            </svg>
                            <span><?php the_date(); ?></span>
                        </p>
                        <button class="link link--arrow"><?php _e("En savoir plus","gbi_inspire"); ?><svg class="icon">
                                <use xlink:href="#icon-arrow"></use>
                            </svg></button>
                    </div>
                </div>
            </a>
            <?php $count++ ?>
            <?php endwhile; ?>
            <!-- end of the loop -->

            <!-- pagination here -->

            <?php wp_reset_postdata(); ?>

            <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>